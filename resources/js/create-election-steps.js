setButtonNavigationClass = (step) => {
    if (step == 0) {
        $('#formStepNext').addClass('ml-auto').removeClass('d-none');
        $('#formStepPrevious').addClass('d-none');
    } else if (step == 1) {
        $('#formStepNext').removeClass('d-none');
        $('#formStepPrevious').removeClass('d-none');
        $('#formStepReview').addClass('d-none');
    } else if (step == 2) {
        $('#formStepNext').addClass('d-none');
        $('#formStepReview').removeClass('d-none');
    } else if (step == 3) {
        $('#formStepReview').addClass('d-none');
    }

}

let createElectionForm = $('#createElectionForm');

if (createElectionForm.length > 0) {
    let currentStep = 0;
    let stepsNavigation = $('#createElectionForm #stepsNavigation');
    setButtonNavigationClass(currentStep);
    
    $('#formStepPrevious').click(function (e) {
        currentStep-=1;
        setButtonNavigationClass(currentStep);
    });

    $('#formStepNext').click(function (e) {
        currentStep+=1;
        setButtonNavigationClass(currentStep);
    });

    $('#formStepReview').click(function (e) {
        currentStep+=1;
        setButtonNavigationClass(currentStep);
    });

}
