<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreeRequest;
use App\Trees\BFSTree;
use App\Trees\Tree;
use Illuminate\Http\Request;



class TreeController extends Controller
{
    /**
     * Returns the height of a binary tree given an integers list
     */
    public function heigth(TreeRequest $request)
    {
        $tree = new Tree($request->toTree);
        $height = $tree->height($tree->root);
        return response()->json(['height' => $height]);
    }

    /**
     * Returns the breadth-first search (BFS) of the binary tree
     */
    public function bfs(TreeRequest $request)
    {
        $tree = new Tree($request->toTree);
        $return = [];
        $tree->ordered($tree->root, $return);
        return response()->json(['bfs' => $return]);
    }
}
