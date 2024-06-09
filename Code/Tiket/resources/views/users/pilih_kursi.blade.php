<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi</title>
    <link rel="icon" href="{{ asset('assets/img/kbt.png') }}" type="image/png">

    <!-- Link to Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link to Custom CSS -->
    <link href="{{ asset('assets/css/tiket.css') }}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/pilih_kursi.css') }}" rel="stylesheet">

</head>

<body>

    @include('partials.header2')

    <div class="container2">

        <div class="table-responsive mb-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Pemesanan</th>
                        <th>Tanggal Keberangkatan</th>
                        <th>Asal Keberangkatan</th>
                        <th>Tujuan Keberangkatan</th>
                        <th>Jumlah Penumpang</th>
                        <th>Waktu Keberangkatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $latestTicket->tanggal_pemesanan }}</td>
                        <td>{{ $latestTicket->tanggal_keberangkatan }}</td>
                        <td>{{ $latestTicket->asal_keberangkatan }}</td>
                        <td>{{ $latestTicket->tujuan_keberangkatan }}</td>
                        <td>{{ $latestTicket->jumlah_penumpang }}</td>
                        <td>{{ $latestTicket->waktu_keberangkatan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form action="{{ route('users.store_pilih_kursi') }}" method="POST">
            @csrf
            <input type="hidden" id="ticket_id" name="ticket_id" value="{{ $latestTicket->id }}">
            <input type="hidden" id="nomor_kursi" name="nomor_kursi" value="">
            <div class="bus-top-view">
                <h2>Pilih Kursi</h2>
                <div class="seat-row">
                    <div class="seat green" data-seat-number="1" onclick="bookSeat(1)">1</div>
                    <div class="seat green" data-seat-number="2" onclick="bookSeat(2)">2</div>
                    <div class="seat black">S</div>
                </div>

                <div class="seat-row">
                    <div class="seat green" data-seat-number="3" onclick="bookSeat(3)">3</div>
                    <div class="seat green" data-seat-number="4" onclick="bookSeat(4)">4</div>
                    <div class="seat green" data-seat-number="5" onclick="bookSeat(5)">5</div>
                </div>
                <div class="seat-row">
                    <div class="seat green" data-seat-number="6" onclick="bookSeat(6)">6</div>
                    <div class="seat green" data-seat-number="7" onclick="bookSeat(7)">7</div>
                    <div class="seat green" data-seat-number="8" onclick="bookSeat(8)">8</div>
                </div>
                <div class="seat-row">
                    <div class="seat green" data-seat-number="9" onclick="bookSeat(9)">9</div>
                    <div class="seat green" data-seat-number="10" onclick="bookSeat(10)">10</div>
                    <div class="seat green" data-seat-number="11" onclick="bookSeat(11)">11</div>
                </div>
                <div class="seat-row">
                    <div class="seat orange">X</div>
                </div>
            </div>
            <div class="notes">
                <p>Ket :</p>
                <p><span class="color-box green"></span> = Kursi kosong</p>
                <p><span class="color-box red"></span> = Kursi sudah di booking</p>
                <p><span class="color-box orange"></span> = Tempat Barang atau Paket</p>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <select id="kelas" name="kelas" class="form-select" required>
                    <option value="" disabled selected>Pilih Kelas KBT</option>
                    <option value="Reguler">Reguler</option>
                    <option value="Executive">Executive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pilih</button>
        </form>
    </div>

    @include('partials.footer2')

    <!-- Include Bootstrap JavaScript from CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/jumlah-penumpang-terakhir',
                method: 'GET',
                success: function(response) {
                    const jumlahPenumpang = response.jumlah_penumpang;
                    let selectedSeatsCount = 0;
                    let selectedSeatsArray = [];

                    function bookSeat(seatNumber) {
                        if (selectedSeatsCount >= jumlahPenumpang) {
                            alert(`Anda sudah memilih ${jumlahPenumpang} kursi. Tidak bisa memilih lebih dari itu.`);
                            return;
                        }

                        const confirmBooking = confirm(`Apakah Anda yakin ingin memesan kursi nomor ${seatNumber}?`);
                        if (confirmBooking) {
                            const seatElement = document.querySelector(`.seat[data-seat-number="${seatNumber}"]`);
                            if (seatElement && !seatElement.classList.contains('red')) {
                                seatElement.classList.remove('green');
                                seatElement.classList.add('red');
                                selectedSeatsCount++;
                                selectedSeatsArray.push(seatNumber.toString());
                                document.getElementById('nomor_kursi').value = selectedSeatsArray.join(',');
                            }
                        }
                    }

                    // Attach event listeners to seat elements
                    const seats = document.querySelectorAll('.seat.green');
                    seats.forEach(seat => {
                        seat.addEventListener('click', function() {
                            const seatNumber = this.getAttribute('data-seat-number');
                            bookSeat(seatNumber);
                        });
                    });
                },
                error: function(error) {
                    console.error('Error fetching jumlah penumpang:', error);
                }
            });

            // Fetch booked seats and disable them
            $.ajax({
                url: '/fetch-booked-seats',
                method: 'GET',
                data: {
                    tanggal_keberangkatan: "{{ $latestTicket->tanggal_keberangkatan }}",
                    waktu_keberangkatan: "{{ $latestTicket->waktu_keberangkatan }}",
                    kelas: "{{ $latestTicket->kelas }}"
                },
                success: function(response) {
                    const bookedSeats = response.booked_seats;
                    bookedSeats.forEach(seatNumber => {
                        const seatElement = document.querySelector(`.seat[data-seat-number="${seatNumber}"]`);
                        if (seatElement) {
                            seatElement.classList.remove('green');
                            seatElement.classList.add('red');
                            seatElement.removeEventListener('click', bookSeat);
                        }
                    });
                },
                error: function(error) {
                    console.error('Error fetching booked seats:', error);
                }
            });
        });
    </script>
</body>

</html>