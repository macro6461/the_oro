<?php

namespace mvc\view {

  use mvc\config\configClass;
  use mvc\session\sessionClass;
  use mvc\cache\cacheManagerClass;

  /**
   * Description of viewClass - vyo͞o
   *
   * @author Andres Felipe Alvarez L <andresf9321@gmail.com>
   */
  class viewClass {

    static public function includeHandlerMessage() {
      include_once configClass::getPathAbsolute() . 'libs/vendor/view/handlerMessage.php';
    }

    static public function getMessageError($key) {
      include configClass::getPathAbsolute() . 'libs/vendor/view/messageError.php';
    }

    static public function includePartial($partial, $variables = null) {
      if ($variables !== null and is_array($variables) and count($variables) > 0) {
        extract($variables);
      }
      include_once configClass::getPathAbsolute() . 'view/' . $partial . '.php';
    }

    static public function includeComponent($module, $component, $variables = array()) {
      include_once configClass::getPathAbsolute() . 'controller/' . $module . '/' . $component . 'ComponentClass.php';
      $componentClass = $component . 'ComponentClass';
      $objComponent = new $componentClass($variables);
      $objComponent->component();
      $objComponent->setArgs((array) $objComponent);
      $objComponent->renderComponent();
    }

    static public function genMetas() {
      $module = sessionClass::getInstance()->getModule();
      $action = sessionClass::getInstance()->getAction();
      $metas = '';
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      if (isset($includes['all']['meta'])) {
        foreach ($includes['all']['meta'] as $include) {
          $metas .= '<meta ' . $include . '>';
        }
      }

      if (isset($includes['all']['link'])) {
        foreach ($includes['all']['link'] as $include) {
          $metas .= '<link ' . $include . '>';
        }
      }

      if (isset($includes[$module][$action]['meta'])) {
        sessionClass::getInstance()->setFlash('meta' . $module . '.' . $action, true);
        foreach ($includes[$module][$action]['meta'] as $include) {
          if (is_array($include) === true and sessionClass::getInstance()->hasFlash('meta' . $include[0]) === false) {
            sessionClass::getInstance()->setFlash('meta' . $include[0], true);
            $entity = explode('.', $include[0]);
            $metas = self::genMetaLink($includes, $entity, $metas, 'meta');
          } else if (is_array($include) === false) {
            $metas .= '<meta ' . $include . '>';
          }
        }
      }

      if (isset($includes[$module][$action]['link'])) {
        sessionClass::getInstance()->setFlash('link' . $module . '.' . $action, true);
        foreach ($includes[$module][$action]['link'] as $include) {
          if (is_array($include) === true and sessionClass::getInstance()->hasFlash('link' . $include[0]) === false) {
            sessionClass::getInstance()->setFlash('link' . $include[0], true);
            $entity = explode('.', $include[0]);
            $metas = self::genMetaLink($includes, $entity, $metas, 'link');
          } else if (is_array($include) === false) {
            $metas .= '<link ' . $include . '>';
          }
        }
      }

      return $metas;
    }

    static private function genMetaLink($includes, $entity, $metaLink, $label) {
      foreach ($includes[$entity[0]][$entity[1]][$label] as $include) {
        if (is_array($include) === true and sessionClass::getInstance()->hasFlash($label . $include[0]) === false) {
          sessionClass::getInstance()->setFlash($label . $include[0], true);
          $entity2 = explode('.', $include[0]);
          $metaLink = self::genMetaLink($includes, $entity2, $metaLink, $label);
        } else if (is_array($include) === false) {
          $metaLink .= '<' . $label . ' ' . $include . '>';
        }
      }
      return $metaLink;
    }

    static public function genStylesheet() {
      $module = sessionClass::getInstance()->getModule();
      $action = sessionClass::getInstance()->getAction();
      $stylesheet = '';
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      if (isset($includes['all']['stylesheet'])) {
        foreach ($includes['all']['stylesheet'] as $include) {
          $stylesheet .= '<link rel="stylesheet" href="' . configClass::getUrlBase() . 'assets/' . $include . '">';
        }
      }
      if (isset($includes[$module][$action]['stylesheet'])) {
        sessionClass::getInstance()->setFlash('css' . $module . '.' . $action, true);
        foreach ($includes[$module][$action]['stylesheet'] as $include) {
          if (is_array($include) === true and sessionClass::getInstance()->hasFlash('css' . $include[0]) === false) {
            sessionClass::getInstance()->setFlash('css' . $include[0], true);
            $entity = explode('.', $include[0]);
            $stylesheet = self::genStylesheetLink($includes, $entity, $stylesheet);
          } else if (is_array($include) === false) {
            $stylesheet .= '<link rel="stylesheet" href="' . configClass::getUrlBase() . 'assets/' . $include . '">';
          }
        }
      }
      return $stylesheet;
    }

    static private function genStylesheetLink($includes, $entity, $stylesheet) {
      foreach ($includes[$entity[0]][$entity[1]]['stylesheet'] as $include) {
        if (is_array($include) === true and sessionClass::getInstance()->hasFlash('css' . $include[0]) === false) {
          sessionClass::getInstance()->setFlash('css' . $include[0], true);
          $entity2 = explode('.', $include[0]);
          $stylesheet = self::genStylesheetLink($includes, $entity2, $stylesheet);
        } else if (is_array($include) === false) {
          $stylesheet .= '<link rel="stylesheet" href="' . configClass::getUrlBase() . 'assets/' . $include . '">';
        }
      }
      return $stylesheet;
    }

    static public function genJavascript() {
      $module = sessionClass::getInstance()->getModule();
      $action = sessionClass::getInstance()->getAction();
      $javascript = '';
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      if (isset($includes['all']['javascript'])) {
        foreach ($includes['all']['javascript'] as $include) {
          $javascript .= '<script src="' . configClass::getUrlBase() . 'assets/' . $include . '"></script>';
        }
      }
      if (isset($includes[$module][$action]['javascript'])) {
        sessionClass::getInstance()->setFlash('js' . $module . '.' . $action, true);
        foreach ($includes[$module][$action]['javascript'] as $include) {
          if (is_array($include) === true and sessionClass::getInstance()->hasFlash('js' . $include[0]) === false) {
            sessionClass::getInstance()->setFlash('js' . $include[0], true);
            $entity = explode('.', $include[0]);
            $javascript = self::genJavascriptLink($includes, $entity, $javascript);
          } else if (is_array($include) === false) {
            $javascript .= '<script src="' . configClass::getUrlBase() . 'assets/' . $include . '"></script>';
          }
        }
      }
      return $javascript;
    }

    static private function genJavascriptLink($includes, $entity, $javascript) {
      foreach ($includes[$entity[0]][$entity[1]]['javascript'] as $include) {
        if (is_array($include) === true and sessionClass::getInstance()->hasFlash('js' . $include[0]) === false) {
          sessionClass::getInstance()->setFlash('js' . $include[0], true);
          $entity2 = explode('.', $include[0]);
          $javascript = self::genJavascriptLink($includes, $entity2, $stylesheet);
        } else if (is_array($include) === false) {
          $javascript .= '<script src="' . configClass::getUrlBase() . 'assets/' . $include . '"></script>';
        }
      }
      return $javascript;
    }

    /**
     * Funcion estatica publica que incluye un favicon en las vistas del sistema
     * @author Leonardo Betancourt Caicedo <leobetacai@gmail.com>
     * @return string
     */
    static public function genFavicon() {
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      $favicon = '<link rel="icon" href="' . configClass::getUrlBase() . 'assets/images/' . $includes['all']['favicon'] . '" type="image/x-icon">';
      return $favicon;
    }
    
    /**
     * System Function to get css libraries from url
     * @return string
     */
    static public function genStylesheetLibrary() {
      $module = sessionClass::getInstance()->getModule();
      $action = sessionClass::getInstance()->getAction();
      $stylesheet = '';
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      if (isset($includes['all']['stylesheet_library'])) {
        foreach ($includes['all']['stylesheet_library'] as $include) {
          $stylesheet .= '<link rel="stylesheet" href="' . $include . '">';
        }
      }
      if (isset($includes[$module][$action]['stylesheet_library'])) {
        sessionClass::getInstance()->setFlash('css' . $module . '.' . $action, true);
        foreach ($includes[$module][$action]['stylesheet_library'] as $include) {
          if (is_array($include) === true and sessionClass::getInstance()->hasFlash('css' . $include[0]) === false) {
            sessionClass::getInstance()->setFlash('css' . $include[0], true);
            $entity = explode('.', $include[0]);
            $stylesheet = self::genStylesheetLibraryLink($includes, $entity, $stylesheet);
          } else if (is_array($include) === false) {
            $stylesheet .= '<link rel="stylesheet" href="' . $include . '">';
          }
        }
      }
      return $stylesheet;
    }

    static private function genStylesheetLibraryLink($includes, $entity, $stylesheet) {
      foreach ($includes[$entity[0]][$entity[1]]['stylesheet_library'] as $include) {
        if (is_array($include) === true and sessionClass::getInstance()->hasFlash('css' . $include[0]) === false) {
          sessionClass::getInstance()->setFlash('css' . $include[0], true);
          $entity2 = explode('.', $include[0]);
          $stylesheet = self::genStylesheetLink($includes, $entity2, $stylesheet);
        } else if (is_array($include) === false) {
          $stylesheet .= '<link rel="stylesheet" href="' . $include . '">';
        }
      }
      return $stylesheet;
    }
    
    /**
     * System function to the js libraries from url
     * @return string
     */
    static public function genJavascriptLibrary() {
      $module = sessionClass::getInstance()->getModule();
      $action = sessionClass::getInstance()->getAction();
      $javascript = '';
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      if (isset($includes['all']['javascript_library'])) {
        foreach ($includes['all']['javascript_library'] as $include) {
          $javascript .= '<script src="' . $include . '"></script>';
        }
      }
      if (isset($includes[$module][$action]['javascript_library'])) {
        sessionClass::getInstance()->setFlash('js' . $module . '.' . $action, true);
        foreach ($includes[$module][$action]['javascript_library'] as $include) {
          if (is_array($include) === true and sessionClass::getInstance()->hasFlash('js' . $include[0]) === false) {
            sessionClass::getInstance()->setFlash('js' . $include[0], true);
            $entity = explode('.', $include[0]);
            $javascript = self::genJavascriptLibraryLink($includes, $entity, $javascript);
          } else if (is_array($include) === false) {
            $javascript .= '<script src="' . $include . '"></script>';
          }
        }
      }
      return $javascript;
    }

    static private function genJavascriptLibraryLink($includes, $entity, $javascript) {
      foreach ($includes[$entity[0]][$entity[1]]['javascript_library'] as $include) {
        if (is_array($include) === true and sessionClass::getInstance()->hasFlash('js' . $include[0]) === false) {
          sessionClass::getInstance()->setFlash('js' . $include[0], true);
          $entity2 = explode('.', $include[0]);
          $javascript = self::genJavascriptLibraryLink($includes, $entity2, $javascript);
        } else if (is_array($include) === false) {
          $javascript .= '<script src="' . $include . '"></script>';
        }
      }
      return $javascript;
    }

    /**
     * Funcion diseñada para integrar un titulo a cada vista de el sistema de el portal
     * @author Leonardo Betancourt Caicedo <leobetacai@gmail.com>
     * @return string
     */
    public static function genTitle() {
      $module = sessionClass::getInstance()->getModule();
      $action = sessionClass::getInstance()->getAction();
      $title = '';
      $includes = cacheManagerClass::getInstance()->loadYaml(configClass::getPathAbsolute() . 'config/view.yml', 'viewYaml');
      if (isset($includes[$module][$action]['title'])) {
        $title = '<title>' . $includes[$module][$action]['title'] . '</title>';
      } else if (isset($includes['all']['title'])) {
        $title = '<title>' . $includes['all']['title'] . '</title>';
      }
      return $title;
    }

    static public function renderComponent($component, $arg = array()) {
      if (isset($component)) {
        if (count($arg) > 0) {
          extract($arg);
        }
        include configClass::getPathAbsolute() . "view/$component.php";
      }
    }

    static public function renderHTML($module, $template, $typeRender, $arg = array()) {
      if (isset($module) and isset($template)) {
        if (count($arg) > 0) {
          extract($arg);
        }
        switch ($typeRender) {
          case 'html':
            header(configClass::getHeaderHtml());
            include_once configClass::getPathAbsolute() . 'libs/vendor/view/head.php';
            include_once configClass::getPathAbsolute() . "view/$module/$template.html.php";
            include_once configClass::getPathAbsolute() . 'libs/vendor/view/foot.php';
            break;
          case 'json':
            header(configClass::getHeaderJson());
            include_once configClass::getPathAbsolute() . "view/$module/$template.json.php";
            break;
          case 'pdf':
            //header(configClass::getHeaderPdf());
            include_once configClass::getPathAbsolute() . "view/$module/$template.pdf.php";
            break;
          case 'javascript':
            header(configClass::getHeaderJavascript());
            include_once configClass::getPathAbsolute() . "view/$module/$template.js.php";
            break;
          case 'xml':
            header(configClass::getHeaderXml());
            include_once configClass::getPathAbsolute() . "view/$module/$template.xml.php";
            break;
          case 'excel2003':
            header(configClass::getHeaderExcel2003());
            include_once configClass::getPathAbsolute() . "view/$module/$template.xls.php";
            break;
          case 'excel2007':
            header(configClass::getHeaderExcel2007());
            include_once configClass::getPathAbsolute() . "view/$module/$template.xlsx.php";
            break;
        }
      }
    }

  }

}
