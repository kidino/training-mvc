use App\Layout;

$obj = new SampleNamespace\MyClass;

$layout = new Layout;

$layout->header();

$obj->show();

$layout->footer();