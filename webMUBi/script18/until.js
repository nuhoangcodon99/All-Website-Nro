function formatNumber(value) {
    if (value === '') {
        return 'Không có chỉ số sức mạnh';
    }
    if (value > 1000000000) {
        return (value / 1000000000).toFixed(1).replace(/\.0$/, '') + ' tỷ';
    } else if (value > 1000000) {
        return (value / 1000000).toFixed(1).replace(/\.0$/, '') + ' triệu';
    } else if (value >= 1000) {
        return (value / 1000).toFixed(1).replace(/\.0$/, '') + ' k';
    } else {
        return value.toLocaleString();
    }
}