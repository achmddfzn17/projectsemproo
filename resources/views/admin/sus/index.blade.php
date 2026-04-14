@extends('layouts.admin')

@section('title', 'Kuisioner SUS')

@section('content')
<!-- Header -->
<div class="mb-8 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-3xl p-8 text-white shadow-2xl hover:shadow-xl transition-shadow duration-300 relative overflow-hidden">
    <div class="absolute inset-0 -z-10">
        <div class="animate-pulse absolute inset-0 bg-gradient-to-r from-blue-500/10 to-indigo-500/10"></div>
    </div>
    <div class="relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold mb-2 flex items-center gap-3">
                    <iconify-icon icon="mdi:clipboard-text-outline" class="text-3xl"></iconify-icon> 
                    Kuisioner SUS
                </h1>
                <p class="text-blue-100 text-lg max-w-xl">System Usability Scale untuk evaluasi sistem</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.sus.daftar') }}" class="flex-1 md:flex-none bg-white/20 hover:bg-white/25 backdrop-blur-sm rounded-2xl px-5 py-3 text-sm font-medium transition-all flex items-center gap-3 hover:shadow-lg transform hover:scale-[1.02]">
                    <iconify-icon icon="mdi:format-list-bulleted" class="text-xl"></iconify-icon> 
                    <span>Daftar Responden</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto pb-12">
<!-- Progress Indicator -->
<div class="sticky top-20 z-20 mb-8 px-4 py-4 bg-white/80 backdrop-blur-lg rounded-3xl shadow-2xl border border-blue-100/50">
    <div class="flex justify-between items-center mb-3">
        <div class="flex items-center gap-3">
            <iconify-icon icon="mdi:progress-check" class="text-xl"></iconify-icon>
            <div>
                <p class="text-sm font-medium text-gray-700">Progress Pengisian</p>
                <span id="progress-text" class="text-2xl font-bold text-blue-600">0%</span>
            </div>
        </div>
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <span id="current-question">0</span> / 10
        </div>
    </div>
    <div class="w-full bg-blue-50 rounded-xl h-2.5 overflow-hidden">
        <div id="progress-bar" class="bg-gradient-to-r from-blue-600 to-indigo-600 h-full transition-all duration-500 ease-out" style="width: 0%"></div>
    </div>
    <div class="mt-2 flex justify-between text-sm text-gray-400">
        <span>Belum mulai</span>
        <span id="progress-status">Selesaikan semua pertanyaan</span>
    </div>
</div>

    <!-- Alert Petunjuk -->
    <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 p-5 rounded-2xl shadow-sm">
        <div class="flex items-start gap-4">
            <div class="bg-blue-600 p-3 rounded-xl text-white shadow-lg flex-shrink-0">
                <iconify-icon icon="mdi:lightbulb-on" class="text-2xl"></iconify-icon>
            </div>
            <div class="flex-1">
                <h5 class="text-base font-bold text-blue-800 mb-2 flex items-center gap-2">
                    <span>Petunjuk Pengisian</span>
                    <span class="bg-blue-200 text-blue-700 text-xs font-bold px-2 py-0.5 rounded-full">Wajib Baca</span>
                </h5>
                <p class="text-blue-700 text-sm leading-relaxed mb-3">
                    Jawablah 10 pertanyaan berikut berdasarkan pengalaman Anda menggunakan sistem ini. 
                    Pilih skala 1-5 dengan jujur:
                </p>
                <div class="flex flex-wrap items-center gap-3 text-sm">
                    <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg shadow-sm">
                        <span class="w-6 h-6 bg-red-100 text-red-600 rounded-full flex items-center justify-center font-bold text-xs">1</span>
                        <span class="text-red-700 font-medium">Sangat Tidak Setuju</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white px-3 py-1.5 rounded-lg shadow-sm">
                        <span class="w-6 h-6 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-xs">5</span>
                        <span class="text-blue-700 font-medium">Sangat Setuju</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.sus.store') }}" method="POST" id="sus-form" class="space-y-8">
        @csrf

        <!-- Data Responden -->
        <div class="bg-white rounded-2xl shadow-lg border border-blue-200 overflow-hidden">
            <div class="p-5 border-b border-blue-100 bg-gradient-to-r from-blue-600 to-indigo-600">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    <iconify-icon icon="mdi:account-details" class="text-xl"></iconify-icon>
                    Data Responden
                </h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <iconify-icon icon="mdi:account"></iconify-icon>
                            </span>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('nama') border-red-500 bg-red-50 @enderror"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <iconify-icon icon="mdi:email-outline"></iconify-icon>
                            </span>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-500 bg-red-50 @enderror"
                                placeholder="email@contoh.com">
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Usia (tahun)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <iconify-icon icon="mdi:calendar-account"></iconify-icon>
                            </span>
                            <input type="number" name="usia" id="usia" value="{{ old('usia') }}" min="17" max="100" required
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('usia') border-red-500 bg-red-50 @enderror"
                                placeholder="Minimal 17 tahun">
                        </div>
                        @error('usia')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pendidikan Terakhir</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10">
                                <iconify-icon icon="mdi:school-outline"></iconify-icon>
                            </span>
                            <select name="pendidikan" id="pendidikan" required
                                class="w-full pl-11 pr-10 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all appearance-none bg-white @error('pendidikan') border-red-500 bg-red-50 @enderror">
                                <option value="">-- Pilih Pendidikan --</option>
                                @foreach(['SMA/SMK', 'D3', 'S1', 'S2', 'S3'] as $p)
                                    <option value="{{ $p }}" {{ old('pendidikan') == $p ? 'selected' : '' }}>{{ $p }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <iconify-icon icon="mdi:chevron-down"></iconify-icon>
                            </span>
                        </div>
                        @error('pendidikan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Pengalaman Komputer</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 z-10">
                                <iconify-icon icon="mdi:laptop"></iconify-icon>
                            </span>
                            <select name="pengalaman_komputer" id="pengalaman_komputer" required
                                class="w-full pl-11 pr-10 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all appearance-none bg-white @error('pengalaman_komputer') border-red-500 bg-red-50 @enderror">
                                <option value="">-- Pilih Pengalaman --</option>
                                @foreach(['1-6 bulan', '6-12 bulan', '1-3 tahun', '> 3 tahun'] as $ek)
                                    <option value="{{ $ek }}" {{ old('pengalaman_komputer') == $ek ? 'selected' : '' }}>{{ $ek }}</option>
                                @endforeach
                            </select>
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <iconify-icon icon="mdi:chevron-down"></iconify-icon>
                            </span>
                        </div>
                        @error('pengalaman_komputer')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Pertanyaan SUS Section -->
        <div class="space-y-5">
            <h3 class="text-xl font-bold text-gray-800 flex items-center gap-3">
                <span class="bg-blue-100 text-blue-600 w-10 h-10 rounded-xl flex items-center justify-center">
                    <iconify-icon icon="mdi:help-circle" class="text-xl"></iconify-icon>
                </span>
                10 Pertanyaan System Usability Scale
            </h3>

            @php
                $questions = [
                    'Saya ingin menggunakan sistem ini sering',
                    'Saya merasa sistem ini sulit digunakan',
                    'Saya merasa sistem ini mudah digunakan',
                    'Saya membutuhkan bantuan orang lain untuk menggunakan sistem ini',
                    'Saya merasa fitur-fitur sistem berjalan dengan baik',
                    'Saya merasa ada banyak hal yang tidak konsisten',
                    'Orang lain akan memahami cara menggunakan sistem ini dengan cepat',
                    'Saya merasa sistem ini membingungkan',
                    'Saya merasa percaya diri menggunakan sistem ini',
                    'Saya perlu belajar banyak sebelum bisa menggunakan sistem ini'
                ];
            @endphp

            @foreach($questions as $index => $q)
                @php $qNum = $index + 1; $qName = 'q' . $qNum; @endphp
                <div class="question-card bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-lg hover:border-blue-200 transition-all duration-300" data-question="{{ $qNum }}">
                    <div class="flex flex-col lg:flex-row lg:items-center gap-5">
                        <!-- Question Header -->
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="bg-blue-600 text-white text-sm font-bold px-3 py-1.5 rounded-lg shadow-sm">
                                    #{{ $qNum }}
                                </span>
                                <span class="text-xs text-gray-500 font-medium">Pertanyaan {{ $qNum }} dari 10</span>
                            </div>
                            <p class="text-gray-800 font-semibold text-base leading-relaxed">{{ $q }}</p>
                        </div>

                        <!-- Likert Scale -->
                        <div class="flex items-center gap-2">
                            <label class="cursor-pointer group/choice relative flex-1">
                                <input type="radio" name="{{ $qName }}" value="1" {{ old($qName) == 1 ? 'checked' : '' }} required class="peer sr-only">
                                <div class="flex flex-col items-center gap-1 p-3 rounded-xl border-2 border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-red-500 peer-checked:bg-red-50 transition-all duration-200 hover:shadow-sm">
                                    <iconify-icon icon="mdi:emoticon-sad-outline" class="text-2xl text-gray-400 group-hover/choice:scale-110 transition-transform peer-checked:text-red-500"></iconify-icon>
                                    <span class="text-sm font-bold text-gray-500 peer-checked:text-red-500">1</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group/choice relative flex-1">
                                <input type="radio" name="{{ $qName }}" value="2" {{ old($qName) == 2 ? 'checked' : '' }} required class="peer sr-only">
                                <div class="flex flex-col items-center gap-1 p-3 rounded-xl border-2 border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-orange-500 peer-checked:bg-orange-50 transition-all duration-200 hover:shadow-sm">
                                    <iconify-icon icon="mdi:emoticon-confused-outline" class="text-2xl text-gray-400 group-hover/choice:scale-110 transition-transform peer-checked:text-orange-500"></iconify-icon>
                                    <span class="text-sm font-bold text-gray-500 peer-checked:text-orange-500">2</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group/choice relative flex-1">
                                <input type="radio" name="{{ $qName }}" value="3" {{ old($qName) == 3 ? 'checked' : '' }} required class="peer sr-only">
                                <div class="flex flex-col items-center gap-1 p-3 rounded-xl border-2 border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-yellow-500 peer-checked:bg-yellow-50 transition-all duration-200 hover:shadow-sm">
                                    <iconify-icon icon="mdi:emoticon-neutral-outline" class="text-2xl text-gray-400 group-hover/choice:scale-110 transition-transform peer-checked:text-yellow-500"></iconify-icon>
                                    <span class="text-sm font-bold text-gray-500 peer-checked:text-yellow-500">3</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group/choice relative flex-1">
                                <input type="radio" name="{{ $qName }}" value="4" {{ old($qName) == 4 ? 'checked' : '' }} required class="peer sr-only">
                                <div class="flex flex-col items-center gap-1 p-3 rounded-xl border-2 border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-green-500 peer-checked:bg-green-50 transition-all duration-200 hover:shadow-sm">
                                    <iconify-icon icon="mdi:emoticon-happy-outline" class="text-2xl text-gray-400 group-hover/choice:scale-110 transition-transform peer-checked:text-green-500"></iconify-icon>
                                    <span class="text-sm font-bold text-gray-500 peer-checked:text-green-500">4</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group/choice relative flex-1">
                                <input type="radio" name="{{ $qName }}" value="5" {{ old($qName) == 5 ? 'checked' : '' }} required class="peer sr-only">
                                <div class="flex flex-col items-center gap-1 p-3 rounded-xl border-2 border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all duration-200 hover:shadow-sm">
                                    <iconify-icon icon="mdi:emoticon-excited-outline" class="text-2xl text-gray-400 group-hover/choice:scale-110 transition-transform peer-checked:text-blue-500"></iconify-icon>
                                    <span class="text-sm font-bold text-gray-500 peer-checked:text-blue-500">5</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Scale Legend -->
                    <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400">
                        <div class="flex items-center gap-1">
                            <span class="text-red-500 font-semibold">1</span>
                            <span>= Sangat Tidak Setuju</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="text-blue-500 font-semibold">5</span>
                            <span>= Sangat Setuju</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Submit Button -->
        <div class="pt-8 mb-12">
            <button type="submit" class="group relative w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-4 px-6 rounded-2xl transition-all transform hover:-translate-y-1 shadow-lg flex items-center justify-center gap-3">
                <iconify-icon icon="mdi:send-variant" class="text-xl group-hover:translate-x-1 transition-transform"></iconify-icon>
                <span class="text-lg">Submit Kuisioner</span>
            </button>
            <p class="text-center text-gray-400 text-sm mt-4 flex items-center justify-center gap-2">
                <iconify-icon icon="mdi:information-outline"></iconify-icon>
                Pastikan semua data telah terisi dengan benar sebelum submit
            </p>
        </div>
    </form>
</div>

<style>
    .question-card {
        scroll-margin-top: 120px;
    }
    .question-card:has(input[type="radio"]:checked) {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-color: #3b82f6;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('sus-form');
        const progressText = document.getElementById('progress-text');
        const progressBar = document.getElementById('progress-bar');
        const currentQuestionEl = document.getElementById('current-question');
        const progressStatusEl = document.getElementById('progress-status');
        const radioInputs = form.querySelectorAll('input[type="radio"]');
        
        function updateProgress() {
            const totalQuestions = 10;
            const answeredQuestions = new Set();
            
            radioInputs.forEach(input => {
                if (input.checked) {
                    answeredQuestions.add(input.name);
                }
            });
            
            const answered = answeredQuestions.size;
            const progress = (answered / totalQuestions) * 100;
            
            progressBar.style.width = `${progress}%`;
            progressText.innerText = `${Math.round(progress)}%`;
            currentQuestionEl.innerText = answered;

            // Update status based on progress
            if (progress === 0) {
                progressStatusEl.innerText = 'Selesaikan semua pertanyaan';
                progressBar.className = 'bg-gradient-to-r from-blue-600 to-indigo-600 h-full transition-all duration-500 ease-out';
            } else if (progress < 50) {
                progressStatusEl.innerText = 'Lanjutkan pengisian...';
                progressBar.className = 'bg-gradient-to-r from-blue-600 to-indigo-600 h-full transition-all duration-500 ease-out';
            } else if (progress < 100) {
                progressStatusEl.innerText = 'Hampir selesai!';
                progressBar.className = 'bg-gradient-to-r from-blue-600 to-indigo-600 h-full transition-all duration-500 ease-out';
            } else {
                progressStatusEl.innerText = 'Semua pertanyaan telah dijawab!';
                progressBar.className = 'bg-gradient-to-r from-green-500 to-emerald-600 h-full transition-all duration-500 ease-out';
            }
        }

        // Add smooth scroll animation when clicking radio
        radioInputs.forEach(input => {
            input.addEventListener('change', function() {
                updateProgress();
                
                // Find next unanswered question and smooth scroll to it
                const currentQuestion = parseInt(this.name.replace('q', ''));
                const nextQuestion = document.querySelector(`.question-card[data-question="${currentQuestion + 1}"]`);
                if (nextQuestion) {
                    nextQuestion.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        });

        // Form submission animation
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <span class="flex items-center justify-center gap-3">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memproses data...
                </span>
            `;
        });

        // Initialize progress on page load
        updateProgress();
    });
</script>
@endsection
