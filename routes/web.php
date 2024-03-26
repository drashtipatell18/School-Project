<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Student\ApproveLeaveController;
use App\Http\Controllers\Student\HomeworkController;
use App\Http\Controllers\Student\StudentAdmissionController;
use App\Http\Controllers\Superadmin\ClassController;
use App\Http\Controllers\Superadmin\Exam\ExamController;
use App\Http\Controllers\Superadmin\Exam\ExamTypeController;
use App\Http\Controllers\Superadmin\Exam\ExampGropuController;
use App\Http\Controllers\Superadmin\Exam\MarksGradeController;
use App\Http\Controllers\Superadmin\Exam\ResultController;
use App\Http\Controllers\Superadmin\Exam\ScheduleController;
use App\Http\Controllers\Superadmin\Expenses\ExpensesController;
use App\Http\Controllers\Superadmin\Expenses\ExpensesHeadController;
use App\Http\Controllers\Superadmin\FrontOffice\ComplaintController;
use App\Http\Controllers\Superadmin\FrontOffice\PhoneCallLogController;
use App\Http\Controllers\Superadmin\FrontOffice\PostalDispatchController;
use App\Http\Controllers\Superadmin\FrontOffice\PostalReceiveController;
use App\Http\Controllers\Superadmin\FrontOffice\SetupFrontOfficeController;
use App\Http\Controllers\Superadmin\Income\IncomeController;
use App\Http\Controllers\Superadmin\Income\IncomeHeadController;
use App\Http\Controllers\Superadmin\Payment\OfflinePaymentController;
use App\Http\Controllers\Superadmin\SectionController;
use App\Models\Admin\FrontOffice\SetupFrontOffice;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Dashboard
Route::get('/admin/dashboard',[DashboardController::class,'adminDashboard'])->name('dashboard');

//HomeWork
Route::get('/admin/homework',[HomeworkController::class,'studentHomework'])->name('homework');
Route::get('/admin/homework/create',[HomeworkController::class,'homeworkCreate'])->name('create.homework');
Route::post('/admin/homework/insert',[HomeworkController::class,'homeworkInsert'])->name('insert.homework');
Route::get('/admin/homework/edit/{id}', [HomeworkController::class, 'homeworkEdit'])->name('edit.homework');
Route::post('/admin/homework/update/{id}', [HomeworkController::class, 'homeworkUpdate'])->name('update.homework');
Route::get('/admin/homework/destroy/{id}',[HomeworkController::class,'homeworkDestroy'])->name('destroy');
Route::get('/get-classes', [HomeworkController::class, 'getClasses']);
Route::get('/get-sections', [HomeworkController::class, 'getSections']);


//Super Admin 

//Sections
Route::get('/admin/section',[SectionController::class,'section'])->name('section');
Route::get('/admin/section/create',[SectionController::class,'sectionCreate'])->name('create.section');
Route::post('/admin/section/insert',[SectionController::class,'sectionInsert'])->name('insert.section');
Route::get('/admin/section/edit/{id}', [SectionController::class, 'sectionEdit'])->name('edit.section');
Route::post('/admin/section/update/{id}', [SectionController::class, 'sectionUpdate'])->name('update.section');
Route::get('/admin/section/destroy/{id}',[SectionController::class,'sectionDestroy'])->name('destroy');

//Class
Route::get('/admin/class',[ClassController::class,'class'])->name('class');
Route::get('/admin/class/create',[ClassController::class,'classCreate'])->name('create.class');
Route::post('/admin/class/insert',[ClassController::class,'classInsert'])->name('insert.class');
Route::get('/admin/class/edit/{id}', [ClassController::class, 'classEdit'])->name('edit.class');
Route::post('/admin/class/update/{id}', [ClassController::class, 'classUpdate'])->name('update.class');
Route::get('/admin/class/destroy/{id}',[ClassController::class,'classDestroy'])->name('destroy');       

//Student Admission
Route::get('/admin/student',[StudentAdmissionController::class,'admission'])->name('student.admission');
Route::get('/admin/student/details/view',[StudentAdmissionController::class,'adminStudentDetails'])->name('student.details.view');

Route::get('/admin/student/admission/create',[StudentAdmissionController::class,'StudentCreate'])->name('create.student');
Route::post('/admin/student/admission/insert',[StudentAdmissionController::class,'StudentInsert'])->name('insert.student');
Route::get('/admin/student/admission/edit/{id}', [StudentAdmissionController::class, 'StudentEdit'])->name('edit.student');
Route::post('/admin/student/admission/update/{id}', [StudentAdmissionController::class, 'StudentUpdate'])->name('update.student');
Route::get('/admin/student/admission/destroy/{id}',[StudentAdmissionController::class,'StudentDestroy'])->name('destroy');   

Route::get('/get-classes', [StudentAdmissionController::class, 'getClasses']);
Route::get('/get-sections', [StudentAdmissionController::class, 'getSections']);


//Approve Leave 
Route::get('/admin/approve_leave',[ApproveLeaveController::class,'approveLeave'])->name('approve.leave');
Route::get('/admin/approve_leave/create',[ApproveLeaveController::class,'approveLeaveCreate'])->name('create.approveleave');
Route::post('/admin/approve_leave/insert',[ApproveLeaveController::class,'approveLeaveInsert'])->name('insert.approveleave');
Route::get('/admin/approve_leave/edit/{id}', [ApproveLeaveController::class, 'approveLeaveEdit'])->name('edit.approveleave');
Route::post('/admin/approve_leave/update/{id}', [ApproveLeaveController::class, 'approveLeaveUpdate'])->name('update.approveleave');
Route::get('/admin/approve_leave/destroy/{id}',[ApproveLeaveController::class,'approveLeaveDestroy'])->name('destroy');
Route::get('/get-students', [ApproveLeaveController::class, 'getStudents']);




//Offline Payments
Route::get('/admin/offlinepayment',[OfflinePaymentController::class,'studentOfflinepayment'])->name('offlinepayment');
Route::get('/admin/offlinepayment/create',[OfflinePaymentController::class,'OfflinepaymentCreate'])->name('create.offlinepayment');

// Route::get('/getSections/{class}',[OfflinePaymentController::class,'getSections'])->name('getSections');

Route::post('/admin/offlinepayment/insert',[OfflinePaymentController::class,'OfflinepaymentInsert'])->name('insert.offlinepayment');
Route::get('/admin/offlinepayment/edit/{id}', [OfflinePaymentController::class, 'OfflinepaymentEdit'])->name('edit.offlinepayment');
Route::post('/admin/offlinepayment/update/{id}', [OfflinePaymentController::class, 'OfflinepaymentUpdate'])->name('update.offlinepayment');
Route::get('/admin/offlinepayment/destroy/{id}',[OfflinePaymentController::class,'OfflinepaymentDestroy'])->name('destroy');
Route::get('/get-students', [OfflinePaymentController::class, 'getStudents']);
Route::get('/get-admission-no', [OfflinePaymentController::class, 'getAdmissionNo']);


//Examinations

//Exam Types
Route::get('/admin/examtype',[ExamTypeController::class,'examType'])->name('examtype');
Route::get('/admin/examtype/create',[ExamTypeController::class,'examtypeCreate'])->name('create.examtype');
Route::post('/admin/examtype/insert',[ExamTypeController::class,'examtypeInsert'])->name('insert.examtype');
Route::get('/admin/examtype/edit/{id}', [ExamTypeController::class, 'examtypeEdit'])->name('edit.examtype');
Route::post('/admin/examtype/update/{id}', [ExamTypeController::class, 'examTtpeUpdate'])->name('update.examtype');
Route::get('/admin/examtype/destroy/{id}',[ExamTypeController::class,'examTypeDestroy'])->name('destroy');

//Exam Group
Route::get('/admin/examgroup',[ExampGropuController::class,'examgroup'])->name('examgroup');
Route::get('/admin/examgroup/create',[ExampGropuController::class,'examGroupCreate'])->name('create.examgroup');
Route::post('/admin/examgroup/insert',[ExampGropuController::class,'examGroupInsert'])->name('insert.examgroup');
Route::get('/admin/examgroup/edit/{id}', [ExampGropuController::class, 'examGroupEdit'])->name('edit.examgroup');
Route::post('/admin/examgroup/update/{id}', [ExampGropuController::class, 'examGroupUpdate'])->name('update.examgroup');
Route::get('/admin/exam/destroy/{id}',[ExampGropuController::class,'examGroupDestroy'])->name('destroy');  


//Exam Marks Grade
Route::get('/admin/marks/grade',[MarksGradeController::class,'marksGrade'])->name('marksgrade');
Route::get('/admin/marks/grade/create',[MarksGradeController::class,'marksGradeCreate'])->name('create.marksgrade');
Route::post('/admin/marks/grade/insert',[MarksGradeController::class,'marksGradeInsert'])->name('insert.marksgrade');
Route::get('/admin/marks/grade/edit/{id}', [MarksGradeController::class, 'marksGradeEdit'])->name('edit.marksgrade');
Route::post('/admin/marks/grade/update/{id}', [MarksGradeController::class, 'marksGradeUpdate'])->name('update.marksgrade');
Route::get('/admin/marks/grade/destroy/{id}',[MarksGradeController::class,'marksGradeDestroy'])->name('destroy');

//Exam
Route::get('/admin/exam',[ExamController::class,'exam'])->name('exam');
Route::get('/admin/exam/create',[ExamController::class,'examCreate'])->name('create.exam');
Route::post('/admin/exam/insert',[ExamController::class,'examInsert'])->name('insert.exam');
Route::get('/admin/exam/edit/{id}', [ExamController::class, 'examEdit'])->name('edit.exam');
Route::post('/admin/exam/update/{id}', [ExamController::class, 'examUpdate'])->name('update.exam');
Route::get('/admin/exam/destroy/{id}',[ExamController::class,'examDestroy'])->name('destroy');   


//Exam Schedule
Route::get('/admin/exam/schedule',[ScheduleController::class,'schedule'])->name('schedule');
Route::get('/admin/exam/schedule/create',[ScheduleController::class,'scheduleCreate'])->name('create.schedule');
Route::post('/admin/exam/schedule/insert',[ScheduleController::class,'scheduleInsert'])->name('insert.schedule');
Route::get('/admin/exam/schedule/edit/{id}', [ScheduleController::class, 'scheduleEdit'])->name('edit.schedule');
Route::post('/admin/exam/schedule/update/{id}', [ScheduleController::class, 'scheduleUpdate'])->name('update.schedule');
Route::get('/admin/exam/schedule/destroy/{id}',[ScheduleController::class,'scheduleDestroy'])->name('destroy');

Route::get('/get-groups', [ScheduleController::class, 'getGroups']);
Route::get('/get-exam', [ScheduleController::class, 'getExam']);



//Exam Result
Route::get('/admin/exam/result',[ResultController::class,'result'])->name('result');
Route::get('/admin/exam/result/create',[ResultController::class,'resultCreate'])->name('create.result');
Route::post('/admin/exam/result/insert', [ResultController::class, 'resultInsert'])->name('insert.result');

Route::get('/admin/exam/result/edit/{id}', [ResultController::class, 'resultEdit'])->name('edit.result');
Route::post('/admin/exam/result/update/{id}', [ResultController::class, 'resultUpdate'])->name('update.result');
Route::get('/admin/exam/result/destroy/{id}',[ResultController::class,'resultDestroy'])->name('destroy');
Route::get('/get-groups/result', [ResultController::class, 'getGroupsRsult']);
Route::get('/get-exam/result', [ResultController::class, 'getExamResult']);
Route::get('/get-exam-groups-and-subjects', [ResultController::class, 'getExamGroupsAndSubjects']);

//Income Head
Route::get('/admin/income/head',[IncomeHeadController::class,'incomeHead'])->name('income.head');
Route::get('/admin/income/head/create',[IncomeHeadController::class,'incomeHeadCreate'])->name('create.income.head');
Route::post('/admin/income/head/insert',[IncomeHeadController::class,'incomeHeadInsert'])->name('insert.income.head');
Route::get('/admin/income/head/edit/{id}', [IncomeHeadController::class, 'incomeHeadEdit'])->name('edit.income.head');
Route::post('/admin/income/head/update/{id}', [IncomeHeadController::class, 'incomeHeadUpdate'])->name('update.income.head');
Route::get('/admin/income/head/destroy/{id}',[IncomeHeadController::class,'incomeHeadDestroy'])->name('destroy.income.head');


//Income
Route::get('/admin/income',[IncomeController::class,'income'])->name('income');
Route::get('/admin/income/create',[IncomeController::class,'incomeCreate'])->name('create.income');
Route::post('/admin/income/insert',[IncomeController::class,'incomeInsert'])->name('insert.income');
Route::get('/admin/income/edit/{id}', [IncomeController::class, 'incomeHeadEdit'])->name('edit.income');
Route::post('/admin/income/update/{id}', [IncomeController::class, 'incomeHeadUpdate'])->name('update.income');
Route::get('/admin/income/destroy/{id}',[IncomeController::class,'incomeHeadDestroy'])->name('destroy.income');


//Expenses Head
Route::get('/admin/expenses/head',[ExpensesHeadController::class,'expensesHead'])->name('expenses.head');
Route::get('/admin/expenses/head/create',[ExpensesHeadController::class,'expensesHeadCreate'])->name('create.expenses.head');
Route::post('/admin/expenses/head/insert',[ExpensesHeadController::class,'expensesHeadInsert'])->name('insert.expenses.head');
Route::get('/admin/expenses/head/edit/{id}', [ExpensesHeadController::class, 'expensesHeadEdit'])->name('edit.expenses.head');
Route::post('/admin/expenses/head/update/{id}', [ExpensesHeadController::class, 'expensesHeadUpdate'])->name('update.expenses.head');
Route::get('/admin/expenses/head/destroy/{id}',[ExpensesHeadController::class,'expensesHeadDestroy'])->name('destroy.expenses.head');


//Expenses
Route::get('/admin/expenses',[ExpensesController::class,'expenses'])->name('expenses');
Route::get('/admin/expenses/create',[ExpensesController::class,'expensesCreate'])->name('create.expenses');
Route::post('/admin/expenses/insert',[ExpensesController::class,'expensesInsert'])->name('insert.expenses');
Route::get('/admin/expenses/edit/{id}', [ExpensesController::class, 'expensesEdit'])->name('edit.expenses');
Route::post('/admin/expenses/update/{id}', [ExpensesController::class, 'expensesUpdate'])->name('update.expenses');
Route::get('/admin/expenses/destroy/{id}',[ExpensesController::class,'expensesDestroy'])->name('destroy.expenses');


//Setup Front Office

//Purpose
Route::get('/admin/purpose',[SetupFrontOfficeController::class,'purpose'])->name('purpose');
Route::get('/admin/purpose/create',[SetupFrontOfficeController::class,'purposeCreate'])->name('create.purpose');
Route::post('/admin/purpose/insert',[SetupFrontOfficeController::class,'purposeInsert'])->name('insert.purpose');
Route::get('/admin/purpose/edit/{id}', [SetupFrontOfficeController::class, 'purposeEdit'])->name('edit.purpose');
Route::post('/admin/purpose/update/{id}', [SetupFrontOfficeController::class, 'purposeUpdate'])->name('update.purpose');
Route::get('/admin/purpose/destroy/{id}',[SetupFrontOfficeController::class,'purposeDestroy'])->name('destroy.purpose');


//Complaint
Route::get('/admin/complaint/type',[SetupFrontOfficeController::class,'complaintType'])->name('complaint.type');
Route::get('/admin/complaint/type/create',[SetupFrontOfficeController::class,'complaintTypeCreate'])->name('create.complaint.type');
Route::post('/admin/complaint/type/insert',[SetupFrontOfficeController::class,'complaintTypeInsert'])->name('insert.complaint.type');
Route::get('/admin/complaint/type/edit/{id}', [SetupFrontOfficeController::class, 'complaintTypeEdit'])->name('edit.complaint.type');
Route::post('/admin/complaint/type/update/{id}', [SetupFrontOfficeController::class, 'complaintTypeUpdate'])->name('update.complaint.type');
Route::get('/admin/complaint/type/destroy/{id}',[SetupFrontOfficeController::class,'complaintTypeDestroy'])->name('destroy.complaint.type');


//Source
Route::get('/admin/source',[SetupFrontOfficeController::class,'source'])->name('source');
Route::get('/admin/source/create',[SetupFrontOfficeController::class,'sourceCreate'])->name('create.source');
Route::post('/admin/source/insert',[SetupFrontOfficeController::class,'sourceInsert'])->name('insert.source');
Route::get('/admin/source/edit/{id}', [SetupFrontOfficeController::class, 'sourceEdit'])->name('edit.source');
Route::post('/admin/source/update/{id}', [SetupFrontOfficeController::class, 'sourceUpdate'])->name('update.source');
Route::get('/admin/source/destroy/{id}',[SetupFrontOfficeController::class,'sourceDestroy'])->name('destroy.source');


//Reference
Route::get('/admin/reference',[SetupFrontOfficeController::class,'reference'])->name('reference');
Route::get('/admin/reference/create',[SetupFrontOfficeController::class,'referenceCreate'])->name('create.reference');
Route::post('/admin/reference/insert',[SetupFrontOfficeController::class,'referenceInsert'])->name('insert.reference');
Route::get('/admin/reference/edit/{id}', [SetupFrontOfficeController::class, 'referenceEdit'])->name('edit.reference');
Route::post('/admin/reference/update/{id}', [SetupFrontOfficeController::class, 'referenceUpdate'])->name('update.reference');
Route::get('/admin/reference/destroy/{id}',[SetupFrontOfficeController::class,'referenceDestroy'])->name('destroy.reference');


//Complain
Route::get('/admin/complaint',[ComplaintController::class,'complaint'])->name('complaint');
Route::get('/admin/complaint/create',[ComplaintController::class,'complaintCreate'])->name('create.complaint');
Route::post('/admin/complaint/insert',[ComplaintController::class,'complaintInsert'])->name('insert.complaint');
Route::get('/admin/complaint/edit/{id}', [ComplaintController::class, 'complaintEdit'])->name('edit.complaint');
Route::post('/admin/complaint/update/{id}', [ComplaintController::class, 'complaintUpdate'])->name('update.complaint');
Route::get('/admin/complaint/destroy/{id}',[ComplaintController::class,'complaintDestroy'])->name('destroy.complaint');



//Postal Receive 
Route::get('/admin/postal/receive',[PostalReceiveController::class,'postalReceive'])->name('postal.receive');
Route::get('/admin/postal/receive/create',[PostalReceiveController::class,'postalReceiveCreate'])->name('create.postal.receive');
Route::post('/admin/postal/receive/insert',[PostalReceiveController::class,'postalReceiveInsert'])->name('insert.postal.receive');
Route::get('/admin/postal/receive/edit/{id}', [PostalReceiveController::class, 'postalReceiveEdit'])->name('edit.postal.receive');
Route::post('/admin/postal/receive/update/{id}', [PostalReceiveController::class, 'postalReceiveUpdate'])->name('update.postal.receive');
Route::get('/admin/postal/receive/destroy/{id}',[PostalReceiveController::class,'postalReceiveDestroy'])->name('destroy.postal.receive');


//Postal Dispatch 
Route::get('/admin/postal/dispatch',[PostalDispatchController::class,'postalDispatch'])->name('postal.dispatch');
Route::get('/admin/postal/dispatch/create',[PostalDispatchController::class,'postalDispatchCreate'])->name('create.postal.dispatch');
Route::post('/admin/postal/dispatch/insert',[PostalDispatchController::class,'postalDispatchInsert'])->name('insert.postal.dispatch');
Route::get('/admin/postal/dispatch/edit/{id}', [PostalDispatchController::class, 'postalDispatchEdit'])->name('edit.postal.dispatch');
Route::post('/admin/postal/dispatch/update/{id}', [PostalDispatchController::class, 'postalDispatchUpdate'])->name('update.postal.dispatch');
Route::get('/admin/postal/dispatch/destroy/{id}',[PostalDispatchController::class,'postalDispatchDestroy'])->name('destroy.postal.dispatch');



//Postal Dispatch 
Route::get('/admin/phone/call/log',[PhoneCallLogController::class,'phoneCallLog'])->name('phone.call.log');
Route::get('/admin/phone/call/log/create',[PhoneCallLogController::class,'phoneCallLogCreate'])->name('create.phone.call.log');
Route::post('/admin/phone/call/log/insert',[PhoneCallLogController::class,'phoneCallLogInsert'])->name('insert.phone.call.log');
Route::get('/admin/phone/call/log/edit/{id}', [PhoneCallLogController::class, 'phoneCallLogEdit'])->name('edit.phone.call.log');
Route::post('/admin/phone/call/log/update/{id}', [PhoneCallLogController::class, 'phoneCallLogUpdate'])->name('update.phone.call.log');
Route::get('/admin/phone/call/log/destroy/{id}',[PhoneCallLogController::class,'phoneCallLogDestroy'])->name('destroy.phone.call.log');