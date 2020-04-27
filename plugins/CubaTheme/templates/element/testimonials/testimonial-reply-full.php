<?php 
use App\Util\TimeUtil;
use App\Util\PathUtil;?>

<div class="media-container-row offset-md-1 mt-3" id="<?php echo $reply->id; ?>" style="background-color: white!important">
    <div class="media-content px-3 align-self-center mbr-white py-2">
        <p class="mbr-author-desc mbr-fonts-style display-6 text-muted">
            <span class="fa fa-reply"></span>&nbsp; <?php echo __d('testimonials', '{0} respondió el {1}', '<b>'.$driver->drivers_profile->driver_name.'</b>', TimeUtil::prettyDate($reply->created, false))?>
        </p>
        <p class="mbr-text testimonial-text mbr-fonts-style display-7">
            <span style="font-style: normal;">
                <?php echo preg_replace("/(\r\n|\n|\r)/", "<br/>", $reply->reply_text);?>
            </span>
        </p>
    </div>
</div>