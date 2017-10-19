<?php

/*
 * Kult Engine
 * PHP framework
 *
 * MIT License
 *
 * Copyright (c) 2016
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package Kult Engine
 * @author Théo Sorriaux (philiphil)
 * @copyright Copyright (c) 2016, Théo Sorriaux
 * @license MIT
 * @link https://github.com/Philiphil/Kult-Engine
 */

namespace kult_engine;

class invokee
{

    public function __construct()
    {
    	$this->require_local_model();
        $this->require_external_basics();
        $this->require_local_controler();
    }

        public function require_local_model()
    {
        require_once(constant('optnpath').'daoableObject.class.php');
        require_once(constant('optnpath').'daoGenerator.class.php');
		$model = scandir(constant("modelpath"));
		foreach ($model as $key) {
			if(contains(".class.", $key)) include( constant("modelpath") . constant("filespace") . $key );
		}
        
    }

    public function require_local_controler()
    {
        $ctrl = scandir(constant("ctrltpath"));
        foreach ($ctrl as $key) {
            if(contains(".php", $key)) include( constant("ctrltpath") . constant("filespace") . $key );
        }
        
    }

    public function require_external_basics()
    {
 		//require_once(constant('vendorpath').'....php');
    }
}