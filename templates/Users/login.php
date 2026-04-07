<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="max-w-md mx-auto mt-16 sm:mt-20 mb-12 px-4 sm:px-6 lg:px-8">
    
    <div class="mb-4">
        <?= $this->Flash->render() ?>
    </div>
    
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-8 sm:p-10 w-full">
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-red-50 mb-4 ring-8 ring-red-50/50">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h3 class="text-2xl font-extrabold text-gray-900 tracking-tight">Bienvenido de nuevo</h3>
            <p class="text-sm text-gray-500 mt-2 font-medium"><?= __('Por favor, ingresa tu correo y contraseña') ?></p>
        </div>

        <?= $this->Form->create(null, ['class' => 'space-y-6']) ?>
            
            <?php
                // Variables de diseño ligeramente más grandes (py-3) para mejor experiencia en móviles
                $inputClasses = 'w-full mt-1.5 px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition-all hover:bg-white text-sm sm:text-base';
                $labelClasses = 'block text-sm font-semibold text-gray-700';
            ?>

            <div>
                <?php
                    echo $this->Form->control('correo', [
                        'required' => true,
                        'label' => ['text' => 'Correo Electrónico', 'class' => $labelClasses],
                        'class' => $inputClasses,
                        'placeholder' => 'ejemplo@correo.com' // Texto de fondo guía
                    ]);
                ?>
            </div>

            <div>
                <?php
                    echo $this->Form->control('password', [
                        'required' => true,
                        'label' => ['text' => 'Contraseña', 'class' => $labelClasses],
                        'class' => $inputClasses,
                        'placeholder' => '••••••••'
                    ]);
                ?>
            </div>
            
            <div class="mt-8 pt-2">
                <?= $this->Form->button(__('Entrar'), [
                    'class' => 'w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-lg transition-colors shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2'
                ]) ?>
            </div>

        <?= $this->Form->end() ?>
        
    </div>
    
    <div class="text-center mt-6">
        <p class="text-xs text-gray-500">
            &copy; <?= date('Y') ?> Desarrollado con CakePHP y Tailwind
        </p>
    </div>
</div>