<?php 
class FileIconPreviewPlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_filters = ['file_markup'];

    public function filterFileMarkup($markup, $args)
    {
        $file = $args['file'];
        $ext = strtolower(pathinfo($file->filename, PATHINFO_EXTENSION));
        $mime = $file->mime_type;

        $debugPath = dirname(__FILE__) . '/debug.log';
        file_put_contents($debugPath, "\n----\nFilename: {$file->filename}\nMIME: {$mime}\nExt: {$ext}", FILE_APPEND);

        // Only for non-images
        if (strpos($mime, 'image/') === 0) {
            file_put_contents($debugPath, "\nImage file — returning default markup", FILE_APPEND);
            return $markup;
        }

        $iconPath = dirname(__FILE__) . "/resources/icons/{$ext}.png";
        $iconExists = file_exists($iconPath);
        file_put_contents($debugPath, "\nIcon exists: " . ($iconExists ? "yes" : "no"), FILE_APPEND);

        $baseUrl = WEB_ROOT . '/plugins/FileIconPreview';
        $iconWebPath = $baseUrl . "/resources/icons/{$ext}.png";
        $defaultWebPath = $baseUrl . "/resources/icons/default.png";
        $iconToUse = $iconExists ? $iconWebPath : $defaultWebPath;

        file_put_contents($debugPath, "\nUsing icon URL: {$iconToUse}", FILE_APPEND);

        $html = '<div style="width:200px; height:200px; background:#f3f3f3; margin-left:10px; border-radius:6px; text-align:center; display:flex; flex-direction:column; justify-content:center; align-items:center;">';
        $html .= '<img src="' . $iconToUse . '" alt="' . $ext . ' icon" style="max-height:100px; max-width:100px;">';
        $html .= '<div style="margin-top:8px; font-size:14px;">' . link_to($file, 'show', $file->original_filename) . '</div>';
        $html .= '</div>';


        return $html;
    }
}
