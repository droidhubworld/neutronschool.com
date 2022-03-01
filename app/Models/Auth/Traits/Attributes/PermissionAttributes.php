<?php

namespace App\Models\Auth\Traits\Attributes;

trait PermissionAttributes
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                    '.$this->getEditButtonAttribute('admin.auth.permission.edit').'
                    '.$this->getDeleteButtonAttribute('admin.auth.permission.destroy').'
                </div>';
    }
}
