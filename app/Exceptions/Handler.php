<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

//    public function render($request , Throwable $e)
//    {
//
////        if($e instanceof ModelNotFoundException){
////
////            return $this->erRes($e->getMessage(),500);
////        }
//
//        return $this->erRes($e->getMessage());
//
//    }



    public function erRes($message)
    {
        return Response()->json([
            'status'=>'error',
            'message'=>$message,
            'data'=>'can`t get',
        ]);
    }
}


//namespace App\Exceptions;
//
//use Error;
//use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
//use Illuminate\Support\Facades\DB;
//use Mockery\Exception;
//use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//use Symfony\Component\Routing\Exception\MethodNotAllowedException;
//use Throwable;
//
//class Handler extends ExceptionHandler
//{
//    /**
//     * A list of the exception types that are not reported.
//     *
//     * @var array
//     */
//    protected $dontReport = [
//        //
//    ];
//
//    /**
//     * A list of the inputs that are never flashed for validation exceptions.
//     *
//     * @var array
//     */
//    protected $dontFlash = [
//        'current_password',
//        'password',
//        'password_confirmation',
//    ];
//
//    /**
//     * Register the exception handling callbacks for the application.
//     *
//     * @return void
//     */
//    public function register()
//    {
//        $this->reportable(function (Throwable $e) {
//            //
//        });
//    }
//
//    public function render($request, Throwable $e)
//    {
//
//        if ($e instanceof ModelNotFoundException) {
//
//            DB::rollBack();
//
//            return $this->erRes($e->getMessage(), 'مدل پيدا نشد', 500);
//        }
//
//        if ($e instanceof NotFoundHttpException) {
//
//            DB::rollBack();
//
//            return $this->erRes($e->getMessage(), 'خطا  http ', 500);
//        }
//
//        if ($e instanceof MethodNotAllowedException) {
//
//            DB::rollBack();
//
//            return $this->erRes($e->getMessage(), 'خطا  متد  ', 500);
//        }
//
//        if ($e instanceof Exception) {
//
//            DB::rollBack();
//
//            return $this->erRes($e->getMessage(), 'خطا  متد  ', 500);
//        }
//
//
//        return $this->erRes($e->getMessage());
//
//    }
//
//
//    public function erRes($message, $short, $code)
//    {
//        return Response()->json([
//            'status' => 'error',
//            '$short' => $short,
//            'message' => $message,
//            'data' => 'can`t get',
//            'code' => $code,
//        ]);
//    }
//}
