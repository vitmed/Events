<?php

namespace App\Http\Controllers;

use App\Models\Organiser;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public $CommentControllerIndex = ['admin', 'user', 'guest'];
    public $CommentControllerStore = ['admin', 'user'];
    public $CommentControllerShow = [ 'admin','guest','user'];
    public $CommentControllerUpdate = ['admin', 'user'];
    public $CommentControllerDestroy = ['admin'];

    public $EventControllerIndex = ['admin', 'user', 'guest'];
    public $EventControllerStore = ['admin', 'user'];
    public $EventControllerShow = [ 'admin','guest','user'];
    public $EventControllerUpdate = ['admin', 'user'];
    public $EventControllerDestroy = ['admin'];

    public $OrganisersControllerIndex = ['admin', 'user', 'guest'];
    public $OrganisersControllerStore = ['admin'];
    public $OrganisersControllerShow = [ 'admin','guest','user'];
    public $OrganisersControllerUpdate = ['admin'];
    public $OrganisersControllerDestroy = ['admin'];
}
