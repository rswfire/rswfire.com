<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class DeployController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->header("X-Hub-Signature-256") !== "sha256=" . hash_hmac("sha256", $request->getContent(), env("DEPLOY_SECRET"))) {
            return(response("Unauthorized", 401));
        }

        // Run your deploy script
        $process = Process::fromShellCommandline(base_path("deploy.sh"));
        $process->run();

        return(response("Deployed", 200));
    }
}
