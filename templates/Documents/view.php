<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 */
?>

<div class="max-w-4xl mx-auto mt-8 mb-12 px-4 sm:px-6 lg:px-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        
        <h3 class="text-3xl font-bold text-gray-800 tracking-tight">
            <?= h($document->titulo) ?>
        </h3>
        
        <div class="flex flex-wrap gap-2 sm:gap-3">
            <?= $this->Html->link(
                '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>' . __('List'), 
                ['action' => 'index'], 
                ['escape' => false, 'class' => 'inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium py-2 px-4 rounded-md transition-colors']
            ) ?>
            
            <?php if ($this->request->getAttribute('identity')->get('role_id') === 1): // Solo Admin ?>
                <?= $this->Html->link(
                    '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>' . __('Edit'), 
                    ['action' => 'edit', $document->id], 
                    ['escape' => false, 'class' => 'inline-flex items-center bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium py-2 px-4 rounded-md transition-colors shadow-sm']
                ) ?>
                
                <?= $this->Form->postLink(
                    '<svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>' . __('Delete'), 
                    ['action' => 'delete', $document->id], 
                    ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $document->id), 'class' => 'inline-flex items-center bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-4 rounded-md transition-colors shadow-sm']
                ) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden w-full">
        
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50/50">
            <h4 class="text-lg font-semibold text-gray-900">Información del Documento</h4>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Detalles completos y archivo adjunto del registro.</p>
        </div>
        
        <div class="px-6 py-2">
            <dl class="divide-y divide-gray-100">
                
                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">ID del Registro</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= $this->Number->format($document->id) ?></dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Propietario / Usuario</dt>
                    <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                        <?= $document->hasValue('user') ? $this->Html->link($document->user->nombre, ['controller' => 'Users', 'action' => 'view', $document->user->id], ['class' => 'text-blue-600 hover:text-blue-800 font-medium hover:underline']) : 'N/A' ?>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Tipo de Documento</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                            <?= h($document->tipo) ?>
                        </span>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Estado Actual</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?php 
                            $estado = strtolower($document->estado);
                            $bgClass = ($estado == 'activo' || $estado == 'aprobado') ? 'bg-green-50 text-green-700 border-green-200' : 'bg-yellow-50 text-yellow-700 border-yellow-200'; 
                        ?>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border <?= $bgClass ?>">
                            <?= h($document->estado) ?>
                        </span>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Fecha de Emisión</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= h($document->fecha_emision) ?: '<span class="text-gray-400 italic">No registrada</span>' ?>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Entidad Emisora</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?= h($document->entidad_emisora) ?: '<span class="text-gray-400 italic">No registrada</span>' ?>
                    </dd>
                </div>

                <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                    <dt class="text-sm font-medium text-gray-500">Registro en Sistema</dt>
                    <dd class="mt-1 text-sm text-gray-500 sm:mt-0 sm:col-span-2">
                        Creado: <?= h($document->created) ?> <br>
                        Modificado: <?= h($document->modified) ?>
                    </dd>
                </div>

                <div class="py-5 sm:grid sm:grid-cols-3 sm:gap-4 bg-blue-50/30 rounded-lg -mx-6 px-6 mt-2 border-t border-blue-100">
                    <dt class="text-sm font-semibold text-gray-700 flex items-center">Archivo Adjunto</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <?php if (!empty($document->archivo_url)): ?>
                            <div class="flex items-center justify-between py-3 pl-3 pr-4 text-sm border border-gray-200 rounded-md bg-white">
                                <div class="flex items-center flex-1 w-0">
                                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"></path></svg>
                                    <span class="flex-1 w-0 ml-2 truncate font-medium text-gray-600">Documento Escaneado</span>
                                </div>
                                <div class="flex-shrink-0 ml-4">
                                    <?= $this->Html->link(
                                        'Descargar', 
                                        '/' . $document->archivo_url, 
                                        [
                                            'target' => '_blank',
                                            'download' => true,
                                            'class' => 'font-medium text-blue-600 hover:text-blue-500 hover:underline transition-colors'
                                        ]
                                    ) ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="text-gray-400 italic py-2 text-sm">El usuario no ha subido ningún archivo.</div>
                        <?php endif; ?>
                    </dd>
                </div>

            </dl>
        </div>
    </div>
</div>