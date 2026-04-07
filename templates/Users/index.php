<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-12">
    
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h3 class="text-2xl font-bold text-gray-800"><?= __('Users') ?></h3>
            
            <?= $this->Html->link(
                __('New User'), 
                ['action' => 'add'], 
                ['class' => 'bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-4 rounded-md transition-colors shadow-sm whitespace-nowrap']
            ) ?>
        </div>

        <div class="overflow-x-auto w-full rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <?php 
                            $thClass = "px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider hover:text-gray-700 transition-colors whitespace-nowrap";
                        ?>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('id') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('nombre') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('apellido') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('correo') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('language') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('direccion') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('created') ?></th>
                        <th class="<?= $thClass ?>"><?= $this->Paginator->sort('modified') ?></th>
                        <th class="<?= $thClass ?> text-right"><?= __('Actions') ?></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= $this->Number->format($user->id) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <?= h($user->nombre) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <?= h($user->apellido) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                            <?= h($user->correo) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800">
                                <?= h($user->language) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 truncate max-w-xs">
                            <?= h($user->direccion) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                            <?= h($user->created) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                            <?= h($user->modified) ?>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-3">
                                <?= $this->Html->link(
                                    '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>', 
                                    ['action' => 'view', $user->id], 
                                    ['escape' => false, 'class' => 'text-indigo-600 hover:text-indigo-900 transition-colors', 'title' => __('View')]
                                ) ?>
                                
                                <?= $this->Html->link(
                                    '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>', 
                                    ['action' => 'edit', $user->id], 
                                    ['escape' => false, 'class' => 'text-amber-500 hover:text-amber-700 transition-colors', 'title' => __('Edit')]
                                ) ?>
                                
                                <?= $this->Form->postLink(
                                    '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>',
                                    ['action' => 'delete', $user->id],
                                    [
                                        'escape' => false,
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $user->id),
                                        'class' => 'text-red-500 hover:text-red-700 transition-colors',
                                        'title' => __('Delete')
                                    ]
                                ) ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center text-sm text-gray-500 gap-4">
            <div class="paginator">
                <ul class="flex flex-wrap justify-center space-x-2">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
            </div>
            <p class="text-center"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
        
    </div>
</div>