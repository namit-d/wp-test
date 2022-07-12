<?php
/*
Plugin Name: Test plugin
Description: A test plugin to demonstrate wordpress functionality with BuildVu
Author: Rahat Yasmin
Version: 0.1
*/
add_action('admin_menu', 'test_plugin_setup_menu');

echo "Hello Jay";
 
function test_plugin_setup_menu(){
    add_menu_page( 'Test Plugin Page', 'Test Plugin', 'manage_options', 'test-plugin', 'test_init' );
}
 
function test_init(){
    test_handle_post();
?>
   
    <h2>Upload a PDF File</h2>
    <!-- Form to handle the upload - The enctype value here is very important -->
    <form  method="post" enctype="multipart/form-data">
        <input type='file' id='test_upload_pdf' name='test_upload_pdf'></input>
        <?php submit_button('Upload') ?>
    </form>
<?php
}
function test_handle_post(){
    // First check if the file appears on the _FILES array
    if(isset($_FILES['test_upload_pdf'])){
        $pdf = $_FILES['test_upload_pdf'];
 
        // Use the wordpress function to upload
        // test_upload_pdf corresponds to the position in the $_FILES array
        // 0 means the content is not associated with any other posts
        $uploaded=media_handle_upload('test_upload_pdf', 0);
        // Error checking using WP functions
        if(is_wp_error($uploaded)){
            echo "Error uploading file: " . $uploaded->get_error_message();
        }else{
            echo "File upload successful!";
            echo implode(" ", wp_upload_dir());
        }
    }
}
 
add_shortcode("pdf", "test_process_shortcode");
 
function test_process_shortcode($atts){
    $a = shortcode_atts(array('id'=>'-1'), $atts);
    // No ID value
    if(strcmp($a['id'], '-1') == 0){
        return "";
    }
    $pdf=$a['id'];
    $url=plugin_dir_url(__FILE__)."output/".$pdf."/".$pdf."/index.html";
    $iframe = "<iframe allowfullscreen class='idrws_pdf_short' src='".$url."' style='width:80%; height:800px;'></iframe>";
 
    return $iframe;
}
 
?>