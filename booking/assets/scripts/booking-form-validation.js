const inputs = document.querySelectorAll("input, select, textarea");
const form = document.getElementById("booking-form");
const validators = [
  {
    errorMessage: "Problem with your name input",
    validateLogic(names) {
      if (names.trim().length < 2) {
        this.errorMessage = "Name too short!";
        return false;
      }
      if (!/^[A-Za-z]+$/.test(names)) {
        this.errorMessage = "No special characters or numbers please!";
        return false;
      }
      return true;
    },
  },
  {
    errorMessage: "Invalid Email",
    validateLogic(email) {
      if (email.trim().length === 0) {
        this.errorMessage = "Email is required!";
        return false;
      }
      if (!/^(.+)@(.+)$/.test(email)) {
        this.errorMessage = "Invalid Email";
        return false;
      }
      return true;
    },
  },
  {
    errorMessage: "Invalid Date",
    validateLogic(date) {
      if (date === "") {
        this.errorMessage = "No date set.";
        return false;
      }
      if (date !== null) {
        if (
          new Date(date) < new Date() &&
          new Date(date).getUTCDate() !== new Date().getUTCDate()
        ) {
          this.errorMessage = "Date can not be set to the past";
          return false;
        }
      }
      return true;
    },
  },
  {
    errorMessage: "Invalid day of arrival and departure!",
    validateLogic(departureDate) {
      let arrivalDate = document.getElementById("arrival-date").value;
      if (new Date(arrivalDate) > new Date(departureDate)) {
        this.errorMessage = "Invalid day of arrival and departure!";
        return false;
      }
      return true;
    },
  },
  {
    errorMessage: "Please choose a room type",
    validateLogic(roomType) {
      console.log(roomType);
      if (roomType === "") {
        return false;
      }
      return true;
    },
  },
  {
    errorMessage: "Flight number is required.",
    validateLogic(flightnum) {
      if (document.getElementById("yes-pickup").checked) {
        if (flightnum === "") {
          this.errorMessage = "Flight number is required!";
          return false;
        }
      }
      return true;
    },
  },
];

function createErrorMessage(errorMessage) {
  const ep = document.createElement("p");
  ep.className = "error-message";
  ep.innerText = errorMessage;
  return ep;
}
inputs.forEach((input) => {
  input.addEventListener("blur", () => {
    validateInput(input);
  });
});

function validationHandler(input, index) {
  if (!validators[index].validateLogic(input.value)) {
    if (input.closest(".input-container").querySelector("p") !== null) {
      input.closest(".input-container").querySelector("p").remove();
    }
    const p = createErrorMessage(validators[index].errorMessage);
    input.closest(".input-container").append(p);
  } else {
    if (input.closest(".input-container").querySelector("p") !== null) {
      input.closest(".input-container").querySelector("p").remove();
    }
  }
}

function validateInput(input) {
  let indexOfValidator;
  if (input.id === "booking-first-name" || input.id === "booking-last-name") {
    indexOfValidator = 0;
  } else if (input.id === "booking-email") {
    indexOfValidator = 1;
  } else if (input.id === "arrival-date" || input.id === "departure-date") {
    indexOfValidator = 2;
  } else if (input.id === "booking-room-type-title") {
    indexOfValidator = 4;
  } else if (input.id === "booking-flight-number") {
    indexOfValidator = 5;
  } else {
    indexOfValidator = null;
  }

  if (indexOfValidator !== null) {
    validationHandler(input, indexOfValidator);
  }
}

const dates = document.querySelectorAll("#arrival-date, #departure-date");

dates.forEach((date) => {
  date.addEventListener("blur", () => {
    if (dates[0] !== "" && dates[1] !== "") {
      dateWatch(dates[1]);
    }
  });
});

function dateWatch(input) {
  if (input.id === "departure-date") {
    if (document.getElementById("arrival-date").value !== "") {
      validationHandler(input, 3);
    }
  }
}

document.getElementById("no-pickup").addEventListener("change", () => {
  if (document.getElementById("no-pickup").checked) {
    document
      .getElementById("booking-flight-number")
      .closest(".input-container")
      .querySelector("p")
      .remove();
  }
});

form.addEventListener("submit", (e) => {
  e.preventDefault();
  inputs.forEach((input, index) => {
    validateInput(input);
  });
});
