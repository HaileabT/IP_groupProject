const verify = document.getElementById("varify1");
const validationForm = (FormSelector) => {
  const formElement = document.querySelector(FormSelector);
  const validationOptions = [
    {
      attribute: "minlength",
      isValid: (input) =>
        input.value && input.value.length >= parseInt(input.minLength, 10),
      errorMessage: (input, label) =>
        `${label.textContent} need to be least ${input.minLength} characters`,
    },
    {
      attribute: "custommaxlength",
      isValid: (input) =>
        input.value &&
        input.value.length <=
          parseInt(input.getAttribute("custommaxlength"), 10),
      errorMessage: (input, label) =>
        `${label.textContent} must be less than ${input.getAttribute(
          "custommaxlength"
        )} character`,
    },
    {
      attribute: "pattern",
      isValid: (input) => {
        const patterRegx = new RegExp(input.pattern);
        return patterRegx.test(input.value);
      },
      errorMessage: (input, label) => `Invalid ${label.textContent}`,
    },
    {
      attribute: "match",
      isValid: (input) => {
        const matchSelector = input.getAttribute("match");
        const matchedElement = formElement.querySelector(`#${matchSelector}`);
        return (
          matchedElement && matchedElement.value.trim() === input.value.trim()
        );
      },
      errorMessage: (input, label) => {
        const matchSelector = input.getAttribute("match");
        const matchedElement = formElement.querySelector(`#${matchSelector}`);
        const matchedLabel =
          matchedElement.parentElement.parentElement.querySelector("label");
        return `${label.textContent} should match with ${matchedLabel.textContent}`;
      },
    },
    {
      attribute: "required",
      isValid: (input) => input.value.trim() !== "",
      errorMessage: (input, label) => `${label.textContent} is Required`,
    },
  ];
  const validateSingleFormGroup = (formGroup) => {
    const label = formGroup.querySelector("label");
    const input = formGroup.querySelector("input,checkbox");
    const errorContainer = formGroup.querySelector(".Error-message");
    const errorIcond = formGroup.querySelector(".fail-icon");
    const successIcon = formGroup.querySelector(".success-icon");
    let formGroupError = false;
    for (const option of validationOptions) {
      if (input.hasAttribute(option.attribute) && !option.isValid(input)) {
        errorContainer.textContent = option.errorMessage(input, label);
        input.style.borderColor = "red";
        errorIcond.classList.add("visible");
        successIcon.classList.remove("visible");
        formGroupError = true;
      }
    }
    if (!formGroupError) {
      errorContainer.textContent = "";
      input.style.borderColor = "green";
      errorIcond.classList.remove("visible");
      successIcon.classList.add("visible");
    }
  };
  formElement.setAttribute("novalidate", "");
  Array.from(formElement.elements).forEach((Element) => {
    Element.addEventListener("blur", (event) => {
      validateSingleFormGroup(event.srcElement.parentElement.parentElement);
    });
  });
  formElement.addEventListener("submit", (event) => {
    event.preventDefault();
    validateAllFormGroup(formElement);
  });
  const validateAllFormGroup = (formValidate) => {
    const formGroup = Array.from(formValidate.querySelectorAll(".container"));
    formGroup.forEach((formGroup) => {
      validateSingleFormGroup(formGroup);
    });
  };
};
validationForm("#all-form-group");
