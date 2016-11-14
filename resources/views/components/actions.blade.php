<?php $id = isset($id) ? $id : (isset($name) ? "{$name}-actions" : spinal_case($view)); ?>

<div class="dropdown">
    <button id="{{ $id }}" class="btn btn-primary btn-tool dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
        <i class="fa fa-gear"></i>
        <span class="caret"></span>
    </button>

    <ul class="dropdown-menu" aria-labelledby="{{ $id }}">
        @include($view)
    </ul>
</div>