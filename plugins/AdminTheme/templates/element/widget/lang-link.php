<?php 
use Cake\Core\Configure;

$other = array('en' => 'es', 'es' => 'en');
$lang = Configure::read('App.language');

$lang_changed_url             = $this->request->getParam('pass');
//$lang_changed_url             = array_merge($lang_changed_url, $this->request->getParam('named'));
$lang_changed_url['?']        = $this->request->getQueryParams();
$lang_changed_url['language'] = $other[$lang];
?>

<?php if($lang != null && $lang == 'en'):?>
    <div class="nav-link info" title="Traducir al Español"><?php echo $this->Html->link($this->Html->image('Spain.png'), $lang_changed_url, array('escape'=>false, 'style'=>'text-decoration:none')) ?></div>
<?php else:?>
    <div class="nav-link info" title="Translate to English"><?php echo $this->Html->link($this->Html->image('UK.png'), $lang_changed_url, array('escape'=>false, 'style'=>'text-decoration:none')) ?></div>
<?php endif;?>