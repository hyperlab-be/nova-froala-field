<?php

namespace MichielKempen\NovaFroalaField\Handlers;

use MichielKempen\NovaFroalaField\Models\Attachment;
use Illuminate\Http\Request;

class DeleteAttachments
{
    /**
     * The field instance.
     *
     * @var \MichielKempen\NovaFroalaField\Froala
     */
    public $field;

    /**
     * Create a new class instance.
     *
     * @param  \MichielKempen\NovaFroalaField\Froala  $field
     * @return void
     */
    public function __construct($field)
    {
        $this->field = $field;
    }

    /**
     * Delete the attachments associated with the field.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $model
     * @return array
     */
    public function __invoke(Request $request, $model)
    {
        Attachment::where('attachable_type', get_class($model))
                ->where('attachable_id', $model->getKey())
                ->get()
                ->each
                ->purge();

        return [$this->field->attribute => ''];
    }
}
