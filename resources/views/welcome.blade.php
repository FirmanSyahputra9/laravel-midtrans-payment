<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Payment - {{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    @fonts
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 px-4 py-10 text-slate-900">
    <main class="mx-auto w-full max-w-6xl">
        <div class="mb-8 text-center">
            <div
                class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg shadow-blue-600/20">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                    stroke="currentColor" class="h-7 w-7">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 8.25h19.5m-16.5 0V6.75A2.25 2.25 0 017.5 4.5h9a2.25 2.25 0 012.25 2.25v1.5m-16.5 0v9.75A2.25 2.25 0 004.5 20.25h15a2.25 2.25 0 002.25-2.25V8.25m-16.5 0h16.5" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold tracking-tight">Payment Gateway</h1>
            <p class="mt-2 text-sm text-slate-500">Payment Gateway menggunakan midtrans</p>
        </div>

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <div class="overflow-hidden rounded-3xl bg-white shadow-xl shadow-slate-200/60">
                <div class="border-b border-slate-100 px-6 py-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total pembayaran</p>
                            <p id="amount-preview" class="mt-1 text-2xl font-bold text-slate-900">Rp10.000</p>
                        </div>
                        <div class="rounded-xl bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600">SANDBOX</div>
                    </div>
                </div>

                <form id="payment-form" class="space-y-5 p-6">
                    @csrf
                    <div>
                        <label for="first_name" class="mb-2 block text-sm font-medium text-slate-700">Nama</label>
                        <input id="first_name" type="text" name="first_name" value="Firman" autocomplete="name"
                            required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                            placeholder="Masukkan nama">
                    </div>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email</label>
                        <input id="email" type="email" name="email" value="test@example.com"
                            autocomplete="email" required
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                            placeholder="contoh@email.com">
                    </div>
                    <div>
                        <label for="amount" class="mb-2 block text-sm font-medium text-slate-700">Nominal</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-sm font-medium text-slate-500">Rp</span>
                            <input id="amount" type="number" name="amount" value="10000" min="1000" required
                                class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-12 pr-4 text-sm outline-none transition focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-500/10"
                                placeholder="10000">
                        </div>
                        <p class="mt-2 text-xs text-slate-400">Minimum pembayaran Rp1.000</p>
                    </div>
                    <button id="payment-button" type="submit"
                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-4 py-3.5 text-sm font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 active:scale-[0.98] disabled:cursor-not-allowed disabled:opacity-60">
                        <svg id="loading-icon" class="hidden h-5 w-5 animate-spin" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        <span id="button-text">Bayar Sekarang</span>
                    </button>
                </form>

                <div class="border-t border-slate-100 bg-slate-50 px-6 py-4">
                    <div class="flex items-center justify-center gap-2 text-xs text-slate-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 0h10.5A1.5 1.5 0 0118.75 12v7.5a1.5 1.5 0 01-1.5 1.5h-10.5a1.5 1.5 0 01-1.5-1.5V12a1.5 1.5 0 011.5-1.5z" />
                        </svg>
                        <span>Secure payment via Midtrans Sandbox</span>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="rounded-3xl border border-amber-200 bg-amber-50 p-6">
                    <div class="flex gap-4">
                        <div
                            class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m0 3h.007v.008H12v-.008zM10.34 3.94l-7.2 12.48a1.875 1.875 0 001.624 2.812h14.472a1.875 1.875 0 001.624-2.812l-7.2-12.48a1.875 1.875 0 00-3.248 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-amber-800">Mode Sandbox</p>
                            <p class="mt-1 text-sm leading-6 text-amber-700">Transaksi ini hanya untuk testing dan
                                tidak menggunakan uang sungguhan.</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-3xl border border-blue-200 bg-blue-50 p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base font-semibold text-blue-800">Pembayaran Kartu
                                Manapun</p>
                            <p class="mt-1 text-sm text-blue-600">Gunakan data berikut untuk testing.</p>
                        </div>
                        <span
                            class="rounded-lg bg-blue-100 px-2.5 py-1 text-xs font-semibold text-blue-700">DEMO</span>
                    </div>
                    <div class="mt-5 space-y-3">
                        <div class="flex items-center justify-between rounded-xl bg-white px-4 py-3">
                            <span class="text-sm text-slate-500">Card Number</span>
                            <code class="text-sm font-semibold text-slate-900">4811 1111 1111 1114</code>
                        </div>
                        <div class="flex items-center justify-between rounded-xl bg-white px-4 py-3">
                            <span class="text-sm text-slate-500">Expiration date</span>
                            <code class="text-sm font-semibold text-slate-900">Jangan Kurang dari Bulan Ini</code>
                        </div>
                        <div class="flex items-center justify-between rounded-xl bg-white px-4 py-3">
                            <span class="text-sm text-slate-500">CVV</span>
                            <code class="text-sm font-semibold text-slate-900">123</code>
                        </div>
                        <div class="flex items-center justify-between rounded-xl bg-white px-4 py-3">
                            <span class="text-sm text-slate-500">OTP / 3DS</span>
                            <code class="text-sm font-semibold text-slate-900">112233</code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        const form = document.getElementById('payment-form');
        const button = document.getElementById('payment-button');
        const buttonText = document.getElementById('button-text');
        const loadingIcon = document.getElementById('loading-icon');
        const amountInput = document.getElementById('amount');
        const amountPreview = document.getElementById('amount-preview');

        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(value || 0);
        }

        amountInput.addEventListener('input', function() {
            amountPreview.textContent = formatRupiah(this.value);
        });

        function setLoading(loading) {
            button.disabled = loading;
            loadingIcon.classList.toggle('hidden', !loading);
            buttonText.textContent = loading ? 'Menyiapkan pembayaran...' : 'Bayar Sekarang';
        }

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            setLoading(true);

            try {
                const formData = new FormData(this);
                const response = await fetch('{{ route('payment.create') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    console.error('Payment error:', data);
                    throw new Error(data.message ?? 'Terjadi kesalahan saat membuat pembayaran.');
                }

                if (!data.token) {
                    throw new Error('Token pembayaran tidak ditemukan.');
                }

                snap.pay(data.token, {
                    onSuccess: function(result) {
                        console.log('PAYMENT SUCCESS:', result);
                        alert('Pembayaran berhasil!');
                    },
                    onPending: function(result) {
                        console.log('PAYMENT PENDING:', result);
                        alert('Pembayaran sedang menunggu.');
                    },
                    onError: function(result) {
                        console.error('PAYMENT ERROR:', result);
                        alert('Pembayaran gagal.');
                    },
                    onClose: function() {
                        console.log('PAYMENT CLOSED');
                    }
                });
            } catch (error) {
                console.error(error);
                alert(error.message);
            } finally {
                setLoading(false);
            }
        });
    </script>
</body>

</html>
