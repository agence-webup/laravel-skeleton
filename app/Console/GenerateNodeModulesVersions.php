<?php

namespace App\Console;

use Illuminate\Console\Command;

class GenerateNodeModulesVersions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nodemodules:versions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export versions for public node_modules in a file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = [];
        $packageLock = null;
        $dependenciesVersions = [];
        try {
            //Get package-lock.json content
            $packageLock = json_decode(file_get_contents(base_path('package-lock.json')), true);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException('Cannot read or decode file "' . base_path('package-lock.json') . '"');
        }
        //Parse package-lock.json content to retrieve dependency name => version
        foreach ($packageLock["dependencies"] as $key => $value) {
            $dependenciesVersions[$key] = $value['version'];
        }

        $publicNodeModules = $this->getPublicNodeModules();

        foreach ($publicNodeModules as $key => $publicNodeModulesName) {
            $result[$publicNodeModulesName] = $dependenciesVersions[$publicNodeModulesName];
        }

        file_put_contents(storage_path("framework/node_module_versions.php"), serialize($result));
    }

    private function getPublicNodeModules()
    {
        $result = [];
        $nodeModulesPath = public_path("node_modules") . '/';
        foreach (array_filter(glob($nodeModulesPath . '*'), 'is_dir') as $key => $path) {
            $result[] = str_replace($nodeModulesPath, "", $path);
        };

        return $result;
    }
}
