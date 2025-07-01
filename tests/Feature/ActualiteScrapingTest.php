<?php

namespace Tests\Feature;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Panther\PantherTestCase;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ActualiteScrapingTest extends PantherTestCase
{
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();

        $app = require __DIR__ . '/../../bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
    }
    
    public function testScrapeActualitesMinistere()
    {
        // Configuration
        $client = static::createPantherClient([
            'browser' => 'chrome',
            'connection_timeout_in_ms' => 180000,
            'request_timeout_in_ms' => 180000,
        ]);

        try {
            // 1. Accès à la page
            $client->request('GET', 'https://www.enseignement.gouv.ci/actualites');
            
            // 2. Attente
            $client->waitFor('._content', 30);

            // 3. Scraping
            $articles = $client->getCrawler()->filter('._content')->each(function ($node) {
                $titre = $node->filter('h5')->text('');
                
                return [
                    'reference' => 'ACTU-'.uniqid(),
                    'titre' => $titre,
                    'slug' => Str::slug($titre),
                    'image' => $this->downloadImage($node),
                    'description' => $node->filter('p')->text(''),
                    'date' => Carbon::now()->format('Y-m-d'), // Adaptez selon le site
                ];
            });

            // 4. Sauvegarde
            $count = Article::upsert(
                $articles,
                ['slug'],
                ['titre', 'description', 'image', 'date']
            );

            $this->assertGreaterThan(0, $count);

        } catch (\Exception $e) {
    try {
        $screenshotPath = __DIR__.'/../../storage/logs/scraping_error_'.date('Ymd_His').'.png';
        if (method_exists($client, 'takeScreenshot')) {
            $client->takeScreenshot($screenshotPath);
        }
    } catch (\Exception $inner) {
        // Ignorer les erreurs de capture si le navigateur est fermé
    }

    $this->fail("Erreur: ".$e->getMessage());
}
    }

    protected function downloadImage($node): string
    {
        try {
            $imageUrl = $node->filter('img')->attr('src');
            if (!$imageUrl) return 'default.jpg';
            
            $contents = file_get_contents($imageUrl);
            $name = 'articles/'.md5($imageUrl).'.jpg';
            Storage::put($name, $contents);
            return $name;
        } catch (\Exception $e) {
            return 'default.jpg';
        }
    }
}