<?php $name = 'transaction-category-' . $category->id; ?>

@extends('components.layouts.actions', compact('name'))

@section("actions.heading.{$name}")
    <i class="fa fa-sitemap"></i>{{ $category->display_name }} (ID: {{ $category->id }})
@endsection

@section("actions.content.{$name}")
    <li>
        <a href="{{ route('transaction-categories.edit', $category->id) }}" data-toggle="modal" data-target="#modal" data-remote="false">
            <i class="fa fa-pencil"></i>
            <span>Edit</span>
        </a>
    </li>

    <li>
        <a href="{{ route('transaction-categories.delete', $category->id) }}" data-toggle="modal" data-target="#modal" data-remote="false">
            <i class="fa fa-trash"></i>
            <span>Delete</span>
        </a>
    </li>
@endsection