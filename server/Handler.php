    <?php 
    //! ---------------------------------------------------------------------------!//
    //!                              Handler                                       !//
    //! ---------------------------------------------------------------------------!//
    $fileTime_bg = microtime(true);
    $sd = microtime(true);

    //! Include Default Helpers
    include("functions/PHPfunctions.php");
    include("functions/Cache.php");
    include("functions/HTMLfunctions.php");
    //! Console logging for debugging
    consolelog("========================================================");
    process("[Handler] setup filename");
    $filename = '../client/Template.php';
    process("[Handler] checking if statement");
    //! check if a template file exists else we will just use the default
    if (file_exists($filename)) {
        process("[Handler]: file exists including template");
        $rawcontent = file_get_contents($filename);
        $template_encoded = json_encode($rawcontent);
        process("[Handler] file has been included");
    } else {
        process("[Handler] file doesnt exists including default template");
        include("default/Templatedefault.php");
        $template = file_get_contents("Templatedefault.php");
        process("[Handler] file has been included");
    }
    //! Include connections
    include("connection/Github.php");
    include("../client/Library.php");
    $ed = microtime(true);
    $completion = ($ed - $sd) * 1000;
    //! Console logging for debugging
    process("[Handler] importing libraries took: $completion miliseconds ");
    consolelog("========================================================");

    //! ---------------------------------------------------------------------------!//
    //!                              Caching process                               !//
    //! ---------------------------------------------------------------------------!//

    
    //! ---------------------------------------------------------------------------!//
    //!                                 Full card process                          !//
    //! ---------------------------------------------------------------------------!//
    function full_card_generation()
    {
        global $ch;
        global $response;
    process("[Handler]: Starting full card process");

    if (!curl_errno($ch)) {
        $repositories = json_decode($response, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            consolelog("========================================================");
            //! for each repo create repo info from the library.php if it doesnt exists use de default
            foreach ($repositories as $repo) {
            $start_time = microtime(true);
               $lib = execute_lib($repo);
               consolelog($lib);
               card_create($lib);
               $end_time = microtime(true);
               $completion_time = ($end_time - $start_time) * 1000;
               //! Console logging for debugging
               consolelog("Card completion time: $completion_time ");
               consolelog("========================================================");
            }
        }
    }
}
full_card_generation();
//! Final time manager
    $fileTime_end = microtime(true);
    $finalcompletion = ($fileTime_end - $fileTime_bg) * 1000;
    consolelog("========================================================");
    process("[Handler] Completed: $completion miliseconds");
    consolelog("========================================================");
