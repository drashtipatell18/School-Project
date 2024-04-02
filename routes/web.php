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
use App\Http\Controllers\Superadmin\FrontOffice\PostalDispatchController;
use App\Http\Controllers\Superadmin\FrontOffice\PostalReceiveController;
use App\Http\Controllers\Superadmin\FrontOffice\SetupFrontOfficeController;
use App\Http\Controllers\Superadmin\Income\IncomeController;
use App\Http\Controllers\Superadmin\Income\IncomeHeadController;
use App\Http\Controllers\Superadmin\Payment\OfflinePaymentController;
use App\Http\Controllers\Superadmin\SectionController;
use App\Http\Controllers\Superadmin\TeacherController;
use App\Http\Controllers\Superadmin\SubjectController;
use App\Http\Controllers\Superadmin\FrontOffice\VisitorBookController;
use App\Http\Controllers\Superadmin\FrontOffice\PhoneCallLogController;
use App\Http\Controllers\Superadmin\FrontOffice\AdmissionEnquiryController;
use App\Http\Controllers\Inventory\SupplierController;
use App\Http\Controllers\Inventory\CategoryController;
use App\Http\Controllers\Inventory\ItemController;
use App\Http\Controllers\Inventory\ItemStockController;
use App\Http\Controllers\Inventory\IssueItemController;
use App\Http\Controllers\Inventory\StoreController;
use App\Http\Controllers\Lesson\LessonController;
use App\Http\Controllers\Lesson\TopicController;
use App\Http\Controllers\Superadmin\HumanResourse\DepartmentController;
use App\Http\Controllers\Superadmin\HumanResourse\DesignationController;
use App\Http\Controllers\Superadmin\HumanResourse\LeaveTypeController;
use App\Http\Controllers\Communicate\NoticeBoradController;
use App\Http\Controllers\Communicate\SendEmailController;
use App\Http\Controllers\Communicate\SendSMSController;
use App\Http\Controllers\Communicate\EmailTemplateController;
use App\Http\Controllers\Communicate\SMSTemplateController;
use App\Models\Admin\FrontOffice\SetupFrontOffice;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontCMS\EventController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth/login');
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

// Teacher 
Route::get('/admin/teacher',[TeacherController::class,'teachers'])->name('teacher');
Route::get('/admin/teacher/create',[TeacherController::class,'teacherCreate'])->name('create.teacher');
Route::post('/admin/teacher/insert',[TeacherController::class,'teacherInsert'])->name('insert.teacher');
Route::get('/admin/teacher/edit/{id}', [TeacherController::class, 'teacherEdit'])->name('edit.teacher');
Route::post('/admin/teacher/update/{id}', [TeacherController::class, 'teacherUpdate'])->name('update.teacher');
Route::get('/admin/teacher/destroy/{id}',[TeacherController::class,'teacherDestroy'])->name('destroy.teacher'); 
Route::get('/admin/teacher/teachersssgin',[TeacherController::class,'teacherAssgin'])->name('teacherassign');
Route::get('/admin/teacher/teacherassgincreate',[TeacherController::class,'teacherAssginCreate'])->name('create.teacherassign');
Route::post('/admin/teacher/teachersssgininsert',[TeacherController::class,'teacherAssginInsert'])->name('insert.teacherassign');
Route::get('/admin/teacher/teacherassginedit/{id}', [TeacherController::class, 'teacherAssginEdit'])->name('edit.teacherassign');
Route::post('/admin/teacher/teachersssginupdate/{id}',[TeacherController::class,'teacherAssginUpdate'])->name('update.teacherassign');
Route::get('/admin/teacher/teachersssgindestroy/{id}',[TeacherController::class,'teacherAssgindestroy'])->name('destroy.teacherassign');
      

// subject 
Route::get('/admin/subject',[SubjectController::class,'subjects'])->name('subject');
Route::get('/admin/subject/create',[SubjectController::class,'subjectCreate'])->name('create.subject');
Route::post('/admin/subject/insert',[SubjectController::class,'subjectInsert'])->name('insert.subject');
Route::get('/admin/subject/edit/{id}', [SubjectController::class, 'subjectEdit'])->name('edit.subject');
Route::post('/admin/subject/update/{id}', [SubjectController::class, 'subjectUpdate'])->name('update.subject');
Route::get('/admin/subject/destroy/{id}',[SubjectController::class,'subjectDestroy'])->name('destroy.subject'); 
Route::get('/admin/subject/subjectgroup',[SubjectController::class,'subjectGroup'])->name('subjectgroup');
Route::get('/admin/subject/subjectgroupcreate',[SubjectController::class,'subjecGroupCreate'])->name('create.subjectgroup');
Route::post('/admin/subject/subjectgroupinsert',[SubjectController::class,'subjecGroupInsert'])->name('insert.subjectgroup');
Route::get('/admin/subject/subjectgroupedit/{id}', [SubjectController::class, 'subjecGroupEdit'])->name('edit.subjectgroup');
Route::post('/admin/subject/subjectgroupupdate/{id}',[SubjectController::class,'subjecGroupUpdate'])->name('update.subjectgroup');
Route::get('/admin/subject/subjectgroupdestroy/{id}',[SubjectController::class,'subjecGroupDestroy'])->name('destroy.subjectgroup');

Route::get('/get-subjects', [SubjectController::class, 'getSubject']);
Route::get('/get-subjectgroups', [SubjectController::class, 'getSubjectGroup']); 
Route::get('/get-lessons', [SubjectController::class, 'getLesson']); 


// lesson
Route::get('/admin/lesson',[LessonController::class,'Lessons'])->name('lessons');
Route::get('/admin/lesson/create',[LessonController::class,'lessonCreate'])->name('create.lesson');
Route::post('/admin/lesson/insert',[LessonController::class,'lessonInsert'])->name('insert.lesson');
Route::get('/admin/lesson/edit/{id}', [LessonController::class, 'lessonEdit'])->name('edit.lesson');
Route::post('/admin/lesson/update/{id}', [LessonController::class, 'lessonUpdate'])->name('update.lesson');
Route::get('/admin/lesson/destroy/{id}',[LessonController::class,'lessonDestroy'])->name('destroy.lesson'); 

// topic
Route::get('/admin/topic',[TopicController::class,'Topics'])->name('topics');
Route::get('/admin/topic/create',[TopicController::class,'topicCreate'])->name('create.topic');
Route::post('/admin/topic/insert',[TopicController::class,'topicInsert'])->name('insert.topic');
Route::get('/admin/topic/edit/{id}', [TopicController::class, 'topicEdit'])->name('edit.topic');
Route::post('/admin/topic/update/{id}', [TopicController::class, 'topicUpdate'])->name('update.topic');
Route::get('/admin/topic/destroy/{id}',[TopicController::class,'topicDestroy'])->name('destroy.topic'); 

// Item Supplier
Route::get('/admin/supplier',[SupplierController::class,'suppliers'])->name('suppliers');
Route::get('/admin/supplier/create',[SupplierController::class,'supplierCreate'])->name('create.supplier');
Route::post('/admin/supplier/insert',[SupplierController::class,'supplierInsert'])->name('insert.supplier');
Route::get('/admin/supplier/edit/{id}', [SupplierController::class, 'supplierEdit'])->name('edit.supplier');
Route::post('/admin/supplier/update/{id}', [SupplierController::class, 'supplierUpdate'])->name('update.supplier');
Route::get('/admin/supplier/destroy/{id}',[SupplierController::class,'supplierDestroy'])->name('destroy.supplier');


// Item Store
Route::get('/admin/store',[StoreController::class,'stores'])->name('stores');
Route::get('/admin/store/create',[StoreController::class,'storeCreate'])->name('create.store');
Route::post('/admin/store/insert',[StoreController::class,'storeInsert'])->name('insert.store');
Route::get('/admin/store/edit/{id}', [StoreController::class, 'storeEdit'])->name('edit.store');
Route::post('/admin/store/update/{id}', [StoreController::class, 'storeUpdate'])->name('update.store');
Route::get('/admin/store/destroy/{id}',[StoreController::class,'storeDestroy'])->name('destroy.store');

// Item Category
Route::get('/admin/category',[CategoryController::class,'categorys'])->name('categorys');
Route::get('/admin/category/create',[CategoryController::class,'categoryCreate'])->name('create.category');
Route::post('/admin/category/insert',[CategoryController::class,'categoryInsert'])->name('insert.category');
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('edit.category');
Route::post('/admin/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('update.category');
Route::get('/admin/category/destroy/{id}',[CategoryController::class,'categoryDestroy'])->name('destroy.category');

// Item 
Route::get('/admin/item',[ItemController::class,'items'])->name('items');
Route::get('/admin/item/create',[ItemController::class,'itemCreate'])->name('create.item');
Route::post('/admin/item/insert',[ItemController::class,'itemInsert'])->name('insert.item');
Route::get('/admin/item/edit/{id}', [ItemController::class, 'itemEdit'])->name('edit.item');
Route::post('/admin/item/update/{id}', [ItemController::class, 'itemUpdate'])->name('update.item');
Route::get('/admin/item/destroy/{id}',[ItemController::class,'itemDestroy'])->name('destroy.item');

// Item Stock
Route::get('/admin/itemstock',[ItemStockController::class,'itemstocks'])->name('itemstocks');
Route::get('/admin/itemstock/create',[ItemStockController::class,'itemstockCreate'])->name('create.itemstock');
Route::post('/admin/itemstock/insert',[ItemStockController::class,'itemstockInsert'])->name('insert.itemstock');
Route::get('/admin/itemstock/edit/{id}', [ItemStockController::class, 'itemstockEdit'])->name('edit.itemstock');
Route::post('/admin/itemstock/update/{id}', [ItemStockController::class, 'itemstockUpdate'])->name('update.itemstock');
Route::get('/admin/itemstock/destroy/{id}',[ItemStockController::class,'itemstockDestroy'])->name('destroy.itemstock');
Route::get('/get-category',[ItemStockController::class,'getCategory'])->name('get-category');
Route::get('/get-item',[ItemStockController::class,'getItem'])->name('get-item');


// Item 
Route::get('/admin/issueitem',[IssueItemController::class,'issueitems'])->name('issueitems');
Route::get('/admin/issueitem/create',[IssueItemController::class,'issueitemCreate'])->name('create.issueitem');
Route::post('/admin/issueitem/insert',[IssueItemController::class,'issueitemInsert'])->name('insert.issueitem');
Route::get('/admin/issueitem/edit/{id}', [IssueItemController::class, 'issueitemEdit'])->name('edit.issueitem');
Route::post('/admin/issueitem/update/{id}', [IssueItemController::class, 'issueitemUpdate'])->name('update.issueitem');
Route::get('/admin/issueitem/destroy/{id}',[IssueItemController::class,'issueitemDestroy'])->name('destroy.issueitem');
Route::get('/get-usertype',[IssueItemController::class,'getUsertype'])->name('get-usertype');
Route::get('/get-allname',[IssueItemController::class,'getAllname'])->name('get-allname');

// Events
Route::get('/admin/event',[EventController::class,'events'])->name('events');
Route::get('/admin/event/create',[EventController::class,'eventCreate'])->name('create.event');
Route::post('/admin/event/insert',[EventController::class,'eventInsert'])->name('insert.event');
Route::get('/admin/event/edit/{id}', [EventController::class, 'eventEdit'])->name('edit.event');
Route::post('/admin/event/update/{id}', [EventController::class, 'eventUpdate'])->name('update.event');
Route::get('/admin/event/destroy/{id}',[EventController::class,'eventDestroy'])->name('destroy.event');


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

//phone  
Route::get('/admin/phone/call/log',[PhoneCallLogController::class,'phoneCallLog'])->name('phone.call.log');
Route::get('/admin/phone/call/log/create',[PhoneCallLogController::class,'phoneCallLogCreate'])->name('create.phone.call.log');
Route::post('/admin/phone/call/log/insert',[PhoneCallLogController::class,'phoneCallLogInsert'])->name('insert.phone.call.log');
Route::get('/admin/phone/call/log/edit/{id}', [PhoneCallLogController::class, 'phoneCallLogEdit'])->name('edit.phone.call.log');
Route::post('/admin/phone/call/log/update/{id}', [PhoneCallLogController::class, 'phoneCallLogUpdate'])->name('update.phone.call.log');
Route::get('/admin/phone/call/log/destroy/{id}',[PhoneCallLogController::class,'phoneCallLogDestroy'])->name('destroy.phone.call.log');


//Visitor Book 
Route::get('/admin/visitor/book',[VisitorBookController::class,'visitorBook'])->name('visitor.book');
Route::get('/admin/visitor/book/create',[VisitorBookController::class,'visitorBookCreate'])->name('create.visitor.book');
Route::post('/admin/visitor/book/insert',[VisitorBookController::class,'visitorBookInsert'])->name('insert.visitor.book');
Route::get('/admin/visitor/book/edit/{id}', [VisitorBookController::class, 'visitorBookEdit'])->name('edit.visitor.book');
Route::post('/admin/visitor/book/update/{id}', [VisitorBookController::class, 'visitorBookUpdate'])->name('update.visitor.book');
Route::get('/admin/visitor/book/destroy/{id}',[VisitorBookController::class,'visitorBookDestroy'])->name('destroy.visitor.book');

//Admission Enquiry 
Route::get('/admin/admission/enquiry',[AdmissionEnquiryController::class,'admissionEnquiry'])->name('admission.enquiry');
Route::get('/admin/admission/enquiry/create',[AdmissionEnquiryController::class,'admissionEnquiryCreate'])->name('create.admission.enquiry');
Route::post('/admin/admission/enquiry/insert',[AdmissionEnquiryController::class,'admissionEnquiryInsert'])->name('insert.admission.enquiry');
Route::get('/admin/admission/enquiry/edit/{id}', [AdmissionEnquiryController::class, 'admissionEnquiryEdit'])->name('edit.admission.enquiry');
Route::post('/admin/admission/enquiry/update/{id}', [AdmissionEnquiryController::class, 'admissionEnquiryUpdate'])->name('update.admission.enquiry');
Route::get('/admin/admission/enquiry/destroy/{id}',[AdmissionEnquiryController::class,'admissionEnquiryDestroy'])->name('destroy.admission.enquiry');

//Designation
Route::get('/admin/designation',[DesignationController::class,'designation'])->name('designation');
Route::get('/admin/designation/create',[DesignationController::class,'designationCreate'])->name('create.designation');
Route::post('/admin/designation/insert',[DesignationController::class,'designationInsert'])->name('insert.designation');
Route::get('/admin/designation/edit/{id}', [DesignationController::class, 'designationEdit'])->name('edit.designation');
Route::post('/admin/designation/update/{id}', [DesignationController::class, 'designationUpdate'])->name('update.designation');
Route::get('/admin/designation/destroy/{id}',[DesignationController::class,'designationDestroy'])->name('destroy.designation'); 


//Designation
Route::get('/admin/department',[DepartmentController::class,'department'])->name('department');
Route::get('/admin/department/create',[DepartmentController::class,'departmentCreate'])->name('create.department');
Route::post('/admin/department/insert',[DepartmentController::class,'departmentInsert'])->name('insert.department');
Route::get('/admin/department/edit/{id}', [DepartmentController::class, 'departmentEdit'])->name('edit.department');
Route::post('/admin/department/update/{id}', [DepartmentController::class, 'departmentUpdate'])->name('update.department');
Route::get('/admin/department/destroy/{id}',[DepartmentController::class,'departmentDestroy'])->name('destroy.department'); 

//Leave Types
Route::get('/admin/leave/type',[LeaveTypeController::class,'leaveType'])->name('leave.type');
Route::get('/admin/leave/type/create',[LeaveTypeController::class,'leaveTypeCreate'])->name('create.leave.type');
Route::post('/admin/leave/type/insert',[LeaveTypeController::class,'leaveTypeInsert'])->name('insert.leave.type');
Route::get('/admin/leave/type/edit/{id}', [LeaveTypeController::class, 'leaveTypeEdit'])->name('edit.leave.type');
Route::post('/admin/leave/type/update/{id}', [LeaveTypeController::class, 'leaveTypeUpdate'])->name('update.leave.type');
Route::get('/admin/leave/type/destroy/{id}',[LeaveTypeController::class,'leaveTypeDestroy'])->name('destroy.leave.type'); 

// notice borad

Route::get('/admin/noticeborad',[NoticeBoradController::class,'noticeborads'])->name('noticeborads');
Route::get('/admin/noticeborad/create',[NoticeBoradController::class,'noticeboradCreate'])->name('create.noticeborad');
Route::post('/admin/noticeborad/insert',[NoticeBoradController::class,'noticeboradInsert'])->name('insert.noticeborad');
Route::get('/admin/noticeborad/edit/{id}', [NoticeBoradController::class, 'noticeboradEdit'])->name('edit.noticeborad');
Route::post('/admin/noticeborad/update/{id}', [NoticeBoradController::class, 'noticeboradUpdate'])->name('update.noticeborad');
Route::get('/admin/noticeborad/destroy/{id}',[NoticeBoradController::class,'noticeboradDestroy'])->name('destroy.noticeborad');


// send email

Route::get('/admin/sendemail',[SendEmailController::class,'sendemails'])->name('sendemails');
Route::get('/admin/sendemail/create',[SendEmailController::class,'sendemailCreate'])->name('create.sendemail');
Route::post('/admin/sendemail/insert',[SendEmailController::class,'sendemailInsert'])->name('insert.sendemail');
Route::get('/admin/sendemail/edit/{id}', [SendEmailController::class, 'sendemailEdit'])->name('edit.sendemail');
Route::post('/admin/sendemail/update/{id}', [SendEmailController::class, 'sendemailUpdate'])->name('update.sendemail');
Route::get('/admin/sendemail/destroy/{id}',[SendEmailController::class,'sendemailDestroy'])->name('destroy.sendemail');

// send SMS

Route::get('/admin/sendsms',[SendSMSController::class,'sendsms'])->name('sendsms');
Route::get('/admin/sendsms/create',[SendSMSController::class,'sendsmsCreate'])->name('create.sendsms');
Route::post('/admin/sendsms/insert',[SendSMSController::class,'sendsmsInsert'])->name('insert.sendsms');
Route::get('/admin/sendsms/edit/{id}', [SendSMSController::class, 'sendsmsEdit'])->name('edit.sendsms');
Route::post('/admin/sendsms/update/{id}', [SendSMSController::class, 'sendsmsUpdate'])->name('update.sendsms');
Route::get('/admin/sendsms/destroy/{id}',[SendSMSController::class,'sendsmsDestroy'])->name('destroy.sendsms');

// send email template

Route::get('/admin/emailtemplate',[EmailTemplateController::class,'emailtemplates'])->name('emailtemplates');
Route::get('/admin/emailtemplate/create',[EmailTemplateController::class,'emailtemplateCreate'])->name('create.emailtemplate');
Route::post('/admin/emailtemplate/insert',[EmailTemplateController::class,'emailtemplateInsert'])->name('insert.emailtemplate');
Route::get('/admin/emailtemplate/edit/{id}', [EmailTemplateController::class, 'emailtemplateEdit'])->name('edit.emailtemplate');
Route::post('/admin/emailtemplate/update/{id}', [EmailTemplateController::class, 'emailtemplateUpdate'])->name('update.emailtemplate');
Route::get('/admin/emailtemplate/destroy/{id}',[EmailTemplateController::class,'emailtemplateDestroy'])->name('destroy.emailtemplate');

// SMS template

Route::get('/admin/smstemplate',[SMSTemplateController::class,'smstemplates'])->name('smstemplates');
Route::get('/admin/smstemplate/create',[SMSTemplateController::class,'smstemplateCreate'])->name('create.smstemplate');
Route::post('/admin/smstemplate/insert',[SMSTemplateController::class,'smstemplateInsert'])->name('insert.smstemplate');
Route::get('/admin/smstemplate/edit/{id}', [SMSTemplateController::class, 'smstemplateEdit'])->name('edit.smstemplate');
Route::post('/admin/smstemplate/update/{id}', [SMSTemplateController::class, 'smstemplateUpdate'])->name('update.smstemplate');
Route::get('/admin/smstemplate/destroy/{id}',[SMSTemplateController::class,'smstemplateDestroy'])->name('destroy.smstemplate');

//Roles 

Route::get('/admin/role',[HomeController::class,'role'])->name('roles');
Route::get('/admin/role/create',[HomeController::class,'roleCreate'])->name('create.role');
Route::post('/admin/role/insert',[HomeController::class,'roleInsert'])->name('insert.role');
Route::get('/admin/role/edit/{id}', [HomeController::class, 'roleEdit'])->name('edit.role');
Route::post('/admin/role/update/{id}', [HomeController::class, 'roleUpdate'])->name('update.role');
Route::get('/admin/role/destroy/{id}',[HomeController::class,'roleDestroy'])->name('destroy.role'); 

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
