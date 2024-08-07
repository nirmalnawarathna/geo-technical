@extends('layouts.app')
@section('content')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic);

        :root {
            --primary-color: #ea7831;
            --text-color: #1d1d1d;
            --bg-color: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .calendar {
            width: 100%;
            max-width: 800px;
            background: var(--bg-color);

            border-radius: 10px;
        }

        .calendar .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ccc;
        }

        .calendar .header .month {
            display: flex;
            align-items: center;
            font-size: 25px;
            font-weight: 600;
            color: var(--text-color);
        }

        .calendar .header .btns {
            display: flex;
            gap: 10px;
        }

        .calendar .header .btns .btn {
            width: 50px;
            height: 40px;
            background: var(--primary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .calendar .header .btns .btn:hover {
            background: #db0933;
            transform: scale(1.05);
        }

        .calendar .weekdays {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .calendar .weekdays .day {
            width: calc(100% / 7 - 10px);
            text-align: center;
            font-size: 16px;
            font-weight: 600;
        }

        .calendar .days {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .calendar .days .day {
            width: calc(100% / 7 - 10px);
            height: 50px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 400;
            color: var(--text-color);
            transition: all 0.3s;
            user-select: none;
        }

        .calendar .days .day:not(.next):not(.prev):hover {
            color: #fff;
            background: var(--primary-color);
            transform: scale(1.05);
        }

        .calendar .days .day.next,
        .calendar .days .day.prev {
            color: #ccc;
        }

        .calendar .days .day.today {
            color: #fff;
            background: var(--primary-color);
        }

        .credits a {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 14px;
            color: #aaa;
        }

        .credits span {
            color: var(--primary-color);
        }
    </style>
    <section class="content">
        <br>



        <div class="row" style="padding-left: 40px;">
            <div class="col-lg">
                <div class="calendar">
                    <div class="header">
                        <div class="month">July 2021</div>
                        <div class="btns">
                            <!-- today -->
                            <div class="btn today">
                                <i class="fas fa-calendar-day"></i>
                            </div>
                            <!-- previous month -->
                            <div class="btn prev">
                                <i class="fas fa-chevron-left"></i>
                            </div>
                            <!-- next month -->
                            <div class="btn next">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="weekdays">
                        <div class="day">Sun</div>
                        <div class="day">Mon</div>
                        <div class="day">Tue</div>
                        <div class="day">Wed</div>
                        <div class="day">Thu</div>
                        <div class="day">Fri</div>
                        <div class="day">Sat</div>
                    </div>
                    <div class="days">
                        <!-- render days with js -->
                    </div>
                </div>
                <br>
                <select class="form-select full-width" aria-label="select example">
                    <option selected>Select Time Zone</option>
                    <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                    <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                    <option value="-10:00">(GMT -10:00) Hawaii</option>
                    <option value="-09:50">(GMT -9:30) Taiohae</option>
                    <option value="-09:00">(GMT -9:00) Alaska</option>
                    <option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                    <option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                    <option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                    <option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                    <option value="-04:50">(GMT -4:30) Caracas</option>
                    <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                    <option value="-03:50">(GMT -3:30) Newfoundland</option>
                    <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                    <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                    <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                    <option value="+00:00" selected="selected">(GMT) Western Europe Time, London, Lisbon, Casablanca
                    </option>
                    <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                    <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                    <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                    <option value="+03:50">(GMT +3:30) Tehran</option>
                    <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                    <option value="+04:50">(GMT +4:30) Kabul</option>
                    <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                    <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                    <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                    <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                    <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                    <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                    <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                    <option value="+08:75">(GMT +8:45) Eucla</option>
                    <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                    <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                    <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                    <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                    <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                    <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                    <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                    <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                    <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                    <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                </select>
            </div>

            <div class="col-sm">
                {{-- content --}}
                <div class="btn-group-vertical " style="padding-left: 80px;">

                    <button type="button" class="btn btn-outline-warning">10.30 am</button> <br>
                    <button type="button" class="btn btn-outline-warning">11.00 am</button> <br>
                    <button type="button" class="btn btn-outline-warning">11.30 am</button> <br>
                    <button type="button" class="btn btn-outline-warning">12.00 pm</button> <br>
                    <button type="button" class="btn btn-outline-warning">12.30 pm</button> <br>
                    <button type="button" class="btn btn-outline-warning">01.00 pm</button> <br>
                    <button type="button" class="btn btn-outline-warning">01.30 pm</button> <br>
                    <button type="button" class="btn btn-outline-warning">02.00 pm</button> <br>
                </div>
                
            </div>

           
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        </div>

        

        
            

    </section>

    <script>
        const daysContainer = document.querySelector(".days");
        const nextBtn = document.querySelector(".next");
        const prevBtn = document.querySelector(".prev");
        const todayBtn = document.querySelector(".today");
        const month = document.querySelector(".month");

        const months = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];

        const days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

        const date = new Date();
        let currentMonth = date.getMonth();
        let currentYear = date.getFullYear();

        const renderCalendar = () => {
            date.setDate(1);
            const firstDay = new Date(currentYear, currentMonth, 1);
            const lastDay = new Date(currentYear, currentMonth + 1, 0);
            const lastDayIndex = lastDay.getDay();
            const lastDayDate = lastDay.getDate();
            const prevLastDay = new Date(currentYear, currentMonth, 0);
            const prevLastDayDate = prevLastDay.getDate();
            const nextDays = 7 - lastDayIndex - 1;

            month.innerHTML = `${months[currentMonth]} ${currentYear}`;

            let days = "";

            for (let x = firstDay.getDay(); x > 0; x--) {
                days += `<div class="day prev">${prevLastDayDate - x + 1}</div>`;
            }

            for (let i = 1; i <= lastDayDate; i++) {
                if (
                    i === new Date().getDate() &&
                    currentMonth === new Date().getMonth() &&
                    currentYear === new Date().getFullYear()
                ) {
                    days += `<div class="day today">${i}</div>`;
                } else {
                    days += `<div class="day">${i}</div>`;
                }
            }

            for (let j = 1; j <= nextDays; j++) {
                days += `<div class="day next">${j}</div>`;
            }

            daysContainer.innerHTML = days;
            hideTodayBtn();
        };

        nextBtn.addEventListener("click", () => {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        });

        prevBtn.addEventListener("click", () => {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        });

        todayBtn.addEventListener("click", () => {
            currentMonth = date.getMonth();
            currentYear = date.getFullYear();
            renderCalendar();
        });

        function hideTodayBtn() {
            if (
                currentMonth === new Date().getMonth() &&
                currentYear === new Date().getFullYear()
            ) {
                todayBtn.style.display = "none";
            } else {
                todayBtn.style.display = "flex";
            }
        }

        renderCalendar();
    </script>
@endsection
