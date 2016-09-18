<?php
namespace app\omni;

class Omni_ADT{
static  public $ADT=[
'task'=>'alap',    
'view'=>'probaview',
'viewF'=>'base.html', 
'view_iniclass'=>'ViewInit', //ha van az aktuális tmpl-ben onnan ha nincs az app könyvtárbol tölti be    
'content_iniclass'=>'ViewInit',
'TSK'=>
    [
    'alap'=>
        [
            'TRT'=>['Alap'=>'app\omni\trt\Alap']
        ],
    'nyito'=>
        [
            'TRT'=>['View'=>'trt\task\View'],
            'contentF'=>'nyito.html'
        ],
     'fajtavalaszt'=>
        [
            'TRT'=>['View'=>'trt\task\View','Content'=>'app\omni\trt\Fajtavalaszt'],
        ]
    ],
'TRT'=>
    [ 
     'SetTask'=>'trt\Task_ADT_SetTask',
    'Task'=>'trt\Task', 
    ]
    
 ];  
}










