<?php
/**
 * Created by PhpStorm.
 * User: adrian
 * Date: 25.01.18
 * Time: 12:12
 */

namespace SilenceCloud\SilenceFrontEnd\Core\Template;


/**
 * Description of Framework_View_Controller_View
 * handless the view funtionality of our mvc framework
 *
 * @author Adrian Stolarski
 * @date 2014-06-17
 * All rights reserverd. (C)opyright by ExtremeDev.
 */
class SimpleTemplate  {

    /**
     * holds variables assigned to template
     * @var array $data
     */
    private $data = array();

    /**
     * holds render status of view
     * @var multitype $render
     */
    private $render = FALSE;

    /**
     * constructor
     * accept a template to load
     * @param string $template
     */
    public function __construct($template) {
        /**
         * trigger render to include file when this model is destroyed
         * if we render it now, we wouldn't be abble to assign variables
         * to the view!
         */
        $this->render = $template;
    }

    /**
     *
     * @param multitype $variable
     * @param multitype $value
     */
    public function assign($variable = null, $value = null){
        $this->data[$variable] = $value;
    }

    /**
     * destructor
     */
    public function __destruct() {
        /**
         * parse data variables into local variables, so that they render to the view
         */
        $data = $this->data;
        /**
         * render view
         */
        if(file_exists($this->render)){
            include $this->render;
        }
    }
}