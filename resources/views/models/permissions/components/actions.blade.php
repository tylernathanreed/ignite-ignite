<?php $name = 'permission-' . $permission->id; ?>

@extends('components.layouts.actions', compact('name'))

@section("actions.heading.{$name}")
    <i class="fa fa-key"></i>{{ $category->name }} / {{ $permission->display_name }}
@endsection

@section("actions.content.{$name}")
    <li>
        <a href="{{ route('permissions.edit', $permission->id) }}" data-toggle="modal" data-target="#modal" data-remote="false">
            <i class="fa fa-pencil"></i>
            <span>Edit</span>
        </a>
    </li>

    <li>
        <a href="{{ route('permissions.delete', $permission->id) }}" data-toggle="modal" data-target="#modal" data-remote="false">
            <i class="fa fa-trash"></i>
            <span>Delete</span>
        </a>
    </li>
@endsection