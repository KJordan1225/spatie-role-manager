<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case LIST_ROLE = 'role-list';
	case CREATE_ROLE = 'role-create';
	case EDIT_ROLE = 'role-edit';
	case DELETE_ROLE = 'role-delete';
	case LIST_PROFILE = 'profile-list';
	case CREATE_PROFILE = 'profile-create';
	case EDIT_PROFILE = 'profile-edit';
	case DELETE_PROFILE = 'profile-delete';
	case LIST_USER = 'user-list';
	case CREATE_USER = 'user-create';
	case EDIT_USER = 'user-edit';
	case DELETE_USER = 'user-delete';
	case LIST_EVENT = 'event-list';
	case CREATE_EVENT = 'event-create';
	case EDIT_EVENT = 'event-edit';
	case DELETE_EVENT = 'event-delete';
	case LIST_CLIENT = 'client-list';
	case CREATE_CLIENT = 'client-create';
	case EDIT_CLIENT = 'client-edit';
	case DELETE_CLIENT = 'client-delete';
	case LIST_DOCUMENT = 'document-list';
	case CREATE_DOCUMENT = 'document-create';
	case EDIT_DOCUMENT = 'document-edit';
	case DELETE_DOCUMENT = 'document-delete';
	case LIST_TASK = 'task-list';
	case CREATE_TASK = 'tsak-create';
	case EDIT_TASK = 'tsak-edit';
	case DELETE_TASK = 'task-delete';
	case LIST_PROJECT = 'project-list';
	case CREATE_PROJECT = 'project-create';
	case EDIT_PROJECT = 'project-edit';
	case DELETE_PROJECT = 'project-delete';	
	case LIST_MYPROFILE = 'myprofile-list';
	case CREATE_MYPROFILE = 'myprofile-create';
	case EDIT_MYPROFILE = 'myprofile-edit';
	case DELETE_MYPROFILE = 'myprofile-delete';
}



