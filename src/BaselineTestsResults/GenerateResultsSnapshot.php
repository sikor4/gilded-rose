<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\BaselineTestsResults\TestScenarioGenerator;

class GenerateResultsSnapshot 
{
    public function __invoke()
    {
        $filePath = __DIR__ . '/tests_results.json';
        
        if (file_exists($filePath)) {
            die ("File exists, script aborts \n");
        }

        $testScenarioGenerator = (new TestScenarioGenerator());
        $results = $testScenarioGenerator->generate();

        file_put_contents($filePath, json_encode($results));

        echo "Snapshot generated succesfully with " . count($results) . " records \n";
        die();
    }
}

if (php_sapi_name() === 'cli') {
    $generator = (new GenerateResultsSnapshot());
    $generator(); 
}
