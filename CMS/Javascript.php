<?php namespace CMS;

class Javascript
{
   private $files      = NULL;
   private $ignore     = NULL;
   private $stack      = NULL;
   private $dp         = NULL;
   private $dp_stack   = NULL;

   public function __construct()
   {
       $this->files    = array();
       $this->ignore   = array('vendor', 'plugins.js', '.', '..', '.DS_Store');
       $this->stack    = array('js');
       $this->dp_stack = array();
   }

   public function loadApplicationFiles($module = 'frontend')
   {
        $this->module   = $module;
        $this->stack[]  = $module;

        $this->_load();

        sort($this->files);
        $this->files = array_reverse($this->files);

        return $this->files;
   }

   private function _load()
   {
       $this->_browse();

       do
       {
           while ($file = readdir($this->dp))
           {
               if (in_array($file, $this->ignore))
                   continue;

               $path = $this->_getPath() . '/' . $file;

               if (is_dir($path))
               {
                   $this->_browse($file);
                   continue;
               }

               array_push($this->files, '/' . $path);
           }

           if ($this->_isBrowsing()) {
               $this->_return();
           }
           else {
               break;
           }

       } while(true);
   }

   private function _getPath()
   {
       //return __DIR__ . '/../public/' . implode('/', $this->stack);

      return implode('/', $this->stack);
   }

   private function _return()
   {
       array_pop($this->stack);
       $this->dp = array_pop($this->dp_stack);
   }

   private function _browse($directory = NULL)
   {
        if ($this->dp) {
            array_push($this->dp_stack, $this->dp);
        }

       if ($directory) {
           array_push($this->stack, $directory);
       }

       $this->dp = opendir($this->_getPath());
   }

   private function _isBrowsing()
   {
       return (count($this->stack) > 2) ? true : false;
   }
}