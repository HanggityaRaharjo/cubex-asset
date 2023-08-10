const timerStatusTest = ({url, domContent}) => {
    axios.get(url)
        .then(({data}) => {
            domContent.empty()

            const result = data.data;

            if(result == 1)
                return domContent.append(`<div class="flex-grow-1 badge-status-inactive">Not Tested</div>`);
            else if(result == 2)
                return domContent.append(`<div class="flex-grow-1 badge-status-active">Tested</div>`);

        }).catch((err) => {
            console.log(err);
        });
}

const timerStatusActive = ({url, domContent}) => {
    axios.get(url)
        .then(({data}) => {
            domContent.empty()

            const result = data.data;

            if(result == 1)
                return domContent.append(`<div class="flex-grow-1 badge-status-active">Active</div>`);
            else if(result == 2)
                return domContent.append(`<div class="flex-grow-1 badge-status-inactive">In Active</div>`);

        }).catch((err) => {
            console.log(err);
        });
}