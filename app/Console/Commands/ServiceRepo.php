<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServiceRepo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Service and Repository for target model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = $this->argument('model');
        $service_path = "app/Services/";
        $repo_path = "app/Repositories/";

        $service = fopen($service_path . $model . 'Service.php', 'w');
        $repo = fopen($repo_path . $model . 'Repository.php', 'w');

        $service_temp =  "<?php\n";
        $service_temp .= "namespace App\Services;\n\n";
        $service_temp .= "use App\Repositories\\{$model}Repository;\n\n";
        $service_temp .= "class {$model}Service {\n";
        $service_temp .= "\tpublic function __construct(public {$model}Repository \$repository) {}\n";
        $service_temp .= "}";

        fwrite($service, $service_temp);

        $repo_temp = "<?php\n";
        $repo_temp .= "namespace App\Repositories;\n\n";
        $repo_temp .= "use App\Models\\{$model};\n\n";
        $repo_temp .= "class {$model}Repository extends BaseRepository {\n";
        $repo_temp .= "\tpublic function __construct({$model} \$model) {\n";
        $repo_temp .= "\t\tparent::__construct(\$model);\n";
        $repo_temp .= "\t}\n";
        $repo_temp .= "}";

        fwrite($repo, $repo_temp);

        fclose($service);
        fclose($repo);
    }
}
