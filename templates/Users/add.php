<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $roles
 */
?>

<div class="max-w-3xl mx-auto mt-8 mb-12 px-4 sm:px-6 lg:px-8">
    
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800"><?= __('Add User') ?></h3>
        
        <?= $this->Html->link(
            '<svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>' . __('List Users'), 
            ['action' => 'index'], 
            ['escape' => false, 'class' => 'text-gray-600 hover:text-blue-600 font-medium transition-colors flex items-center']
        ) ?>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sm:p-8 w-full">
        
        <?= $this->Form->create($user, ['class' => 'space-y-6']) ?>
            
            <?php
                // Variables para no repetir las clases de Tailwind
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
                        'label' => ['class' => $labelClasses]
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
                <?= $this->Form->button(__('Submit'), [
                    'class' => 'w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-bold py-2.5 px-8 rounded-lg transition-colors shadow-sm'
                ]) ?>
            </div>

        <?= $this->Form->end() ?>
    </div>
</div>