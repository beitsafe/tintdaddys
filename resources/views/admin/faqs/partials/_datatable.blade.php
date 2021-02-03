@php
    $dataTableparams = [
        'columns' => [
            ['data' => 'question', 'name' => 'question'],
            ['data' => 'answer', 'name' => 'answer'],
            ['data' => 'action', 'orderable' => false, 'searchable' => false]
        ]
    ];
@endphp

<table id="datatable-buttons" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" data-params="{{ json_encode($dataTableparams) }}">
    <thead>
    <tr>
        <th>Question</th>
        <th>Answer</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody></tbody>
</table>
