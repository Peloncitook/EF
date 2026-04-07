<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Document $document
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>

<div class="max-w-3xl mx-auto mt-8 mb-12 px-4 sm:px-6 lg:px-8">
    
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800"><?= __('Add Document') ?></h3>
        
        <?= $this->Html->link(
            '<svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>' . __('List Documents'), 
            ['action' => 'index'], 
            ['escape' => false, 'class' => 'text-gray-600 hover:text-blue-600 font-medium transition-colors flex items-center']
        ) ?>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 w-full">
        
        <?= $this->Form->create($document, ['type' => 'file', 'class' => 'space-y-6']) ?>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <?php
                    // Variables para no repetir las clases de Tailwind en cada input
                    $inputClasses = 'w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:bg-white';
                    $labelClasses = 'block text-sm font-semibold text-gray-700';

                    echo $this->Form->control('user_id', [
                        'options' => $users,
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('titulo', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('tipo', [
                        'type' => 'select',
                        'options' => [
                            'Carnet de Identidad' => 'Carnet de Identidad',
                            'Certificado Académico' => 'Certificado Académico',
                            'Título Universitario' => 'Título Universitario',
                            'Currículum Vitae' => 'Currículum Vitae',
                            'Otro' => 'Otro'
                        ],
                        'empty' => 'Seleccione un tipo...',
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('estado', [
                        'type' => 'select',
                        'options' => [
                            'Recibido' => 'Recibido',
                            'Revision' => 'Revision',
                            'Aprobado' => 'Aprobado',
                            'Rechazado' => 'Rechazado',
                        ],
                        'empty' => 'Seleccione un Estado...',
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('fecha_emision', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('entidad_emisora', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);
                ?>
            </div>

            <div class="mt-8 border-t border-gray-100 pt-6">
                <?php 
                    echo $this->Form->control('archivo_url', [
                        'type' => 'file', 
                        'label' => ['text' => 'Subir Documento Escaneado', 'class' => $labelClasses . ' mb-2'],
                        // Clases especiales de Tailwind para botones de subida de archivos (file:...)
                        'class' => 'w-full mt-1 text-sm text-gray-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer'
                    ]);
                ?>
            </div>

            <div class="mt-8 flex justify-end">
                <?= $this->Form->button(__('Submit'), [
                    'class' => 'w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-8 rounded-lg transition-colors shadow-sm'
                ]) ?>
            </div>

        <?= $this->Form->end() ?>
    </div>
</div>