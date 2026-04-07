<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="max-w-4xl mx-auto mt-8 mb-12 px-4 sm:px-6 lg:px-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        
        <h3 class="text-3xl font-bold text-gray-800 tracking-tight flex items-center">
            <?= h($user->nombre) ?> <?= h($user->apellido) ?>
        </h3>
        
        <div class="flex flex-wrap gap-2 sm:gap-3">
            <?= $this->Html->link(
                '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>' . __('List'), 
                ['action' => 'index'], 
                ['escape' => false, 'class' => 'inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium py-2 px-4 rounded-md transition-colors']
            ) ?>
            
       
            <?= $this->Html->link(
                '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>' . __('Edit'), 
                ['action' => 'edit', $user->id], 
                ['escape' => false, 'class' => 'inline-flex items-center bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium py-2 px-4 rounded-md transition-colors shadow-sm']
            ) ?>
            
            <?= $this->Form->postLink(
                '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>' . __('Delete'), 
                ['action' => 'delete', $user->id], 
                ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded-md transition-colors shadow-sm']
            ) ?>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden w-full">
        
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
            <h4 class="text-lg font-semibold text-gray-900">Perfil de Usuario</h4>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Información personal y detalles de contacto.</p>
        </div>
        
        <div class="px-6 py-2">
            <dl class="divide-y divide-gray-100">
                
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">ID de Usuario</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= $this->Number->format($user->id) ?></dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Nombre Completo</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= h($user->nombre) ?> <?= h($user->apellido) ?>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                    <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                        <a href="mailto:<?= h($user->correo) ?>" class="text-blue-600 hover:text-blue-800 font-medium hover:underline">
                            <?= h($user->correo) ?>
                        </a>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Idioma de Preferencia</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                            <?= h($user->language) ?: 'No especificado' ?>
                        </span>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= h($user->direccion) ?: '<span class="text-gray-400 italic">Sin dirección registrada</span>' ?>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Actividad en Sistema</dt>
                    <dd class="mt-1 text-sm text-gray-500 sm:mt-0 sm:col-span-2">
                        <span class="block"><strong>Creado:</strong> <?= h($user->created) ?></span>
                        <span class="block mt-1"><strong>Última modificación:</strong> <?= h($user->modified) ?></span>
                    </dd>
                </div>

            </dl>
        </div>
    </div>
</div>