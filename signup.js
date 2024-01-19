
const verify=document.getElementById('varify1')
const validationForm=FormSelector=>{
    const formElement=document.querySelector(FormSelector);
    const validationOptions=[
        {
            attribute:'required',
            isValid:input=>input.value.trim()!=='',
            errorMessage:(input,label)=>`${label.textContent} is Required`,
        },
        {
            
        }
    ];
    const validateSingleFormGroup=formGroup=>{
       const label=formGroup.querySelector('label');
        const input=formGroup.querySelector('input,checkbox');
        const errorContainer=formGroup.querySelector('.Error-message');
        const errorIcond=formGroup.querySelector('.fail-icon');
        const successIcon=formGroup.querySelector('.success-icon');
        for(const option of validationOptions)
        {
            if(input.hasAttribute(option.attribute)&&!option.isValid(input))
            {
               errorContainer.textContent=option.errorMessage(input,label); 
            }
        }

    }
    formElement.setAttribute('novalidate','');
    formElement.addEventListener('submit',event=>{
event.preventDefault();
validateAllFormGroup(formElement);
    });
    const validateAllFormGroup=formValidate=>{
        const formGroup=Array.from(formValidate.querySelectorAll('.container'));
        formGroup.forEach(formGroup=>{
          validateSingleFormGroup(formGroup);
        });
    }
}
validationForm('#all-form-group');