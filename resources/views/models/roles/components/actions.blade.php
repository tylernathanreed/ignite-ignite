<?php $name = 'role-' . $role->id; ?>

@extends('components.layouts.actions', compact('name'))

@section("actions.heading.{$name}")
    <i class="fa fa-puzzle-piece"></i>{{ $role->display_name }}
@endsection

@section("actions.content.{$name}")
    <li>
        <a href="{{ route('roles.edit', $role->id) }}" data-toggle="modal" data-target="#modal" data-remote="false">
            <i class="fa fa-pencil"></i>
            <span>Edit</span>
        </a>
    </li>

    <li>
        <a href="{{ route('roles.delete', $role->id) }}" data-toggle="modal" data-target="#modal" data-remote="false">
            <i class="fa fa-trash"></i>
            <span>Delete</span>
        </a>
    </li>
@endsection