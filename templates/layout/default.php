<?php

/**

 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)

 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 *

 * Licensed under The MIT License

 * For full copyright and license information, please see the LICENSE.txt

 * Redistributions of files must retain the above copyright notice.

 *

 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)

 * @link          https://cakephp.org CakePHP(tm) Project

 * @since         0.10.0

 * @license       https://opensource.org/licenses/mit-license.php MIT License

 * @var \App\View\AppView $this

 */



$cakeDescription = 'CakePHP: the rapid development php framework';

?>

<!DOCTYPE html>

<html>

<head>

    <?= $this->Html->charset() ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>

        <?= $cakeDescription ?>:

        <?= $this->fetch('title') ?>

    </title>

    <?= $this->Html->meta('icon') ?>


  <?php
    //<?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>


    <script src="https://cdn.tailwindcss.com"></script>



    <?= $this->fetch('meta') ?>

    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>

</head>

<body>

	<nav class="bg-white shadow-sm border-b border-gray-200">
	    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="flex justify-between items-center h-16">
		    
		    <?php 
		        $identity = $this->request->getAttribute('identity'); 
		        $esAdmin = ($identity && $identity->get('role_id') === 1);
		    ?>

		    <div class="flex items-center space-x-8">
		        
		        <div class="flex-shrink-0">
		            <a href="<?= $this->Url->build('/') ?>" class="text-2xl font-extrabold tracking-tight">
		                <span class="text-red-600">Cake</span><span class="text-gray-800">PHP</span>
		            </a>
		        </div>

		        <?php if ($identity && $esAdmin) : ?>
		            <div class="hidden sm:flex space-x-6">
		                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>" 
		                   class="text-gray-600 hover:text-blue-600 text-sm font-medium transition-colors">
		                    Users
		                </a>
		                <a href="<?= $this->Url->build(['controller' => 'Documents', 'action' => 'index']) ?>" 
		                   class="text-gray-600 hover:text-blue-600 text-sm font-medium transition-colors">
		                    Documents
		                </a>
		            </div>
		        <?php endif; ?>

		    </div>

		    <div class="flex items-center space-x-2 sm:space-x-4">
		        
		        <?php if ($identity) : ?>
		            
		            <span class="mx-2 sm:mx-4 font-bold text-gray-700 text-sm">
		                <?= h($identity->get('correo')) ?>
		            </span>
		            
		            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" 
		               class="text-red-600 hover:text-red-800 hover:bg-red-50 px-3 py-2 rounded-md text-sm font-medium transition-colors">
		                Cerrar Sesión
		            </a>
		            
		        <?php else : ?>
		            
		            <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/" 
		               class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">
		                Documentation
		            </a>
		            <a target="_blank" rel="noopener" href="https://api.cakephp.org/" 
		               class="text-gray-600 hover:text-blue-600 px-3 py-2 text-sm font-medium transition-colors">
		                API
		            </a>
		            
		        <?php endif; ?>
		    </div>

		</div>
	    </div>
	</nav>

	<main class="py-8 w-full">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		    <?= $this->Flash->render() ?>
		    <?= $this->fetch('content') ?>
		</div>
	    </main>

    <footer>

    </footer>

</body>

</html>