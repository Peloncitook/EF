<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $roles
 */
?>

<div class="max-w-3xl mx-auto mt-8 mb-12 px-4 sm:px-6 lg:px-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        
        <h3 class="text-2xl font-bold text-gray-800"><?= __('Edit User') ?></h3>
        
        <div class="flex flex-wrap gap-2 sm:gap-3">
            <?= $this->Html->link(
                '<svg class="w-4 h-4 mr-1.5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>' . __('List Users'), 
                ['action' => 'index'], 
                ['escape' => false, 'class' => 'inline-flex items-center bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium py-2 px-4 rounded-md transition-colors']
            ) ?>
            
            <?= $this->Form->postLink(
                '<svg class="w-4 h-4 mr-1.5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>' . __('Delete'),
                ['action' => 'delete', $user->id],
                [
                    'escape' => false, 
                    'confirm' => __('Are you sure you want to delete # {0}?', $user->id), 
                    'class' => 'inline-flex items-center bg-red-600 hover:bg-red-700 text-white border border-red-200 text-sm font-medium py-2 px-4 rounded-md transition-colors'
                ]
            ) ?>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 w-full">
        
        <?= $this->Form->create($user, ['class' => 'space-y-6']) ?>
            
            <?php
                // Variables para mantener los estilos consistentes
                $inputClasses = 'w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:bg-white';
                $labelClasses = 'block text-sm font-semibold text-gray-700';
            ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <?php
                    echo $this->Form->control('role_id', [
                        'options' => $roles, 
                        'label' => ['text' => 'Asignar Rol', 'class' => $labelClasses],
                        'class' => $inputClasses
                    ]);

                    echo $this->Form->control('language', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('nombre', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('apellido', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('correo', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);

                    echo $this->Form->control('password', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses],
                       
                    ]);
                ?>
            </div>

            <div class="mt-6 border-t border-gray-100 pt-6">
                <?php 
                    echo $this->Form->control('direccion', [
                        'class' => $inputClasses,
                        'label' => ['class' => $labelClasses]
                    ]);
                ?>
            </div>

            <div class="mt-8 flex justify-end">
                <?= $this->Form->button(__('Edit'), [
                    'class' => 'w-full sm:w-auto bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2.5 px-8 rounded-lg transition-colors shadow-sm'
                ]) ?>
            </div>

        <?= $this->Form->end() ?>
    </div>
</div>