<?php
namespace controllers;
use Ubiquity\core\postinstall\Display;
use Ubiquity\themes\ThemesManager;
use Ubiquity\controllers\Startup;
//use Ubiquity\orm\DAO;
use services\DAO;

/**
 * Controller IndexController
 **/
class IndexController extends ControllerBase{
  public function index(){
    //var_dump(DAO::getOne("models\Sys_users", 2));
    //var_dump(DAO::getOne("models\Sys_users", 2));

    /*
    // START TRANSACTION
    var_dump(DAO::beginTransaction()); // exec TRANSACTION with PDO method
    //var_dump(DAO::execute("START TRANSACTION")); // exec TRANSACTION as SQL

    for($i=1; $i<=10; $i++){
      // troditional
      // execute SQL sentences
      var_dump(DAO::execute("INSERT INTO `sys_logs` (`id`, `event`, `log`, `c_date`, `c_user_id`, `show_type`) VALUES (NULL, 'EVENT', 'LOG FROM SQL', now(), '1', '1');"));

      // use ORM / DAO
      $sys_log = new \models\Sys_logs();
      $sys_log->setEvent('EVENT');
      $sys_log->setLog('LOG FROM DAO');
      var_dump(DAO::save($sys_log));
      var_dump($sys_log);
    }

    //var_dump(DAO::execute("COMMIT")); // exec COMMIT as SQL
    var_dump(DAO::commit()); // exec COMMIT with PDO method

    //var_dump(DAO::execute("ROLLBACK")); // exec ROLLBACK as SQL
    //var_dump(DAO::rollBack()); // exec ROLLBACK with PDO method


    //$query = DAO::query("SELECT * FROM `sys_options`");
    //var_dump($query->fetchAll());

     */
    //$defaultPage=Display::getDefaultPage();
    $defaultPage="main/vIndex.html";
    $links=Display::getLinks();
    $infos=Display::getPageInfos();

    $activeTheme=ThemesManager::getActiveTheme();
    $themes=Display::getThemes();
    if(sizeof($themes)>0){
      $this->loadView('@activeTheme/main/vMenu.html',compact('themes','activeTheme'));
    }
    $this->loadView($defaultPage,compact('defaultPage','links','infos','activeTheme'));
  }


  public function ct($theme){
    $config=ThemesManager::saveActiveTheme($theme);
    //header("Location: ".$config['siteUrl']);
    //Startup::forward("");
    $this->index();
  }

}
