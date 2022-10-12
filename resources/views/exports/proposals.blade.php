<table>
    <thead>
        <tr>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                No
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Tgl Usul
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Pengusul
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Fraksi
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Usulan
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Permasalahan
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Alamat
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Koefisien
            </th>
            <th style="font-size: 14px;font-weight;bold; vertical-align:middle;text-align:center;">
                Koordinat <br />(lintang, bujur)
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proposals as $proposal)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $proposal->created_at }}</td>
                <td>
                    @foreach ($proposal->users as $user)
                        {{ $loop->index + 1 }}. {{ $user->name }} <br>
                    @endforeach
                </td>
                <td>
                    @foreach ($proposal->users as $user)
                        {{ $loop->index + 1 }}. {{ $user->fraction->name }} <br>
                    @endforeach
                </td>
                <td>{{ $proposal->title }}</td>
                <td>{{ $proposal->description }}</td>
                <td>{{ $proposal->address }}</td>
                <td>{{ $proposal->quantity }} {{ $proposal->unit }}</td>
                <td>({{ $proposal->latitude }},{{ $proposal->longitude }})</td>
            </tr>
        @endforeach
    </tbody>
</table>
