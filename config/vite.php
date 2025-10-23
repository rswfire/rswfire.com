<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Build Directory
    |--------------------------------------------------------------------------
    |
    | The directory where Vite will output built assets.
    |
    */

    'build_directory' => env('VITE_BUILD_DIRECTORY', 'assets'),

];
```

Then in your `.env`:
```
VITE_BUILD_DIRECTORY=assets
