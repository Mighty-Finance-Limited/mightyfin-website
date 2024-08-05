<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LoanApplicationController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\AboutPage;
use App\Http\Livewire\AlreadyExistPage;
use App\Http\Livewire\CareerPage;
use App\Http\Livewire\ContactPage;

use App\Http\Livewire\Dashboard\Loans\EligibilityScoreView;
use App\Http\Livewire\FaqPage;
use App\Http\Livewire\GuidelinePage;
use App\Http\Livewire\Loans\AssetFinanceLoan;
use App\Http\Livewire\Loans\EducationalLoan;
use App\Http\Livewire\Loans\HomeLoan;
use App\Http\Livewire\Loans\PersonalLoan;
use App\Http\Livewire\Loans\SMELoan;
use App\Http\Livewire\Loans\VehicleLoan;
use App\Http\Livewire\Loans\WIBLoan;
use App\Http\Livewire\Loans\Payday;
use App\Http\Livewire\PersonFour;
use App\Http\Livewire\PersonOne;
use App\Http\Livewire\PersonThree;
use App\Http\Livewire\PersonTwo;
use App\Http\Livewire\PrivacyPolicyPage;
use App\Http\Livewire\ServicePage;
use App\Http\Livewire\SuccessEmailPage;
use App\Http\Livewire\SuccessPage;
use App\Http\Livewire\TeamPage;
use App\Http\Livewire\TermsConditionPage;
use App\Http\Livewire\WelcomePage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', WelcomePage::class)->name('welcome');
Route::get('welcome', WelcomePage::class)->name('dashboard');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/share-docs', [UserController::class, 'share_doc'])->name('share.docs');

Route::resource('posts', PostController::class);
Route::get('eligibility-score/{id}', EligibilityScoreView::class)->name('score');

// Site Pages
Route::get('faq', FaqPage::class)->name('faq');
Route::get('about-us', AboutPage::class)->name('about.us');
Route::get('our-team', TeamPage::class)->name('about.team');
Route::get('careers', CareerPage::class)->name('about.careers');
Route::get('contact-us', ContactPage::class)->name('contact');
Route::get('services', ServicePage::class)->name('services');


Route::post('request-for-loan', [LoanApplicationController::class, 'store'])->name('loan-request');
Route::post('assign-manual-approval', [LoanApplicationController::class, 'assign_manual'])->name('assign-manual-approval');

Route::get('get-application', [LoanApplicationController::class, 'getLoan'])->name('get-application');
Route::get('update-existing-application', [LoanApplicationController::class, 'updateExistingLoan'])->name('update-existing-application');

// Our Team
Route::get('vwanganji-bowa-ceo', PersonOne::class)->name('ceo');
Route::get('chiluba-bowa-coo', PersonTwo::class)->name('coo');
Route::get('lemmy-amatende-cfo', PersonThree::class)->name('cfo');
Route::get('chanda-mwenda-sales-and-marketing-director', PersonFour::class)->name('sales');


// Site Services Pages
Route::get('payday', Payday::class)->name('payday');
Route::get('inventory-financing', PersonalLoan::class)->name('inventory');
Route::get('credit-facility', EducationalLoan::class)->name('credit');
Route::get('bridging-financing', AssetFinanceLoan::class)->name('bridging');
Route::get('equipment-financing', HomeLoan::class)->name('equipment');
Route::get('offer-trade-credit', SMELoan::class)->name('offer');
Route::get('refinancing', VehicleLoan::class)->name('refinancing');
Route::get('women-in-business-soft-loans', WIBLoan::class)->name('view-wib-loans');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

// Legal Pages
Route::get('privacy-policy', PrivacyPolicyPage::class)->name('pp');
Route::get('terms-and-conditions', TermsConditionPage::class)->name('terms');
Route::get('how-to', GuidelinePage::class)->name('guideline');



// Alerts and Notifications
Route::get('successfully-applied-a-loan', SuccessPage::class)->name('success-application');
Route::get('email-sent-successfully', SuccessEmailPage::class)->name('success-email');


// Errors
Route::get('account-already-exists', AlreadyExistPage::class)->name('already-exists');
Route::get('you-already-have-a-loan/{id}', [LoanApplicationController::class, 'alreadyLoaned'])->name('loan-exists');
