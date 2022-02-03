import pandas, numpy
import matplotlib.pyplot as plt

try:
    data = list()
    file = open('hockey_players.csv', 'r')
    check = 0
    head = list()
    for f in file:
        line = list()
        str = f.replace('\"', '')
        str = str.replace('\n', '')
        object = str.split(sep=',')
        if check == 0:
            head = object
            check = 100
        else:
            data.append(object)

    df = pandas.DataFrame(data, columns=head)
    print(df)

    def Number_cw():
        fig, ax = plt.subplots()
        number = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
        players = df['name'].drop_duplicates()
        counts = [0] * 15
        for player in players:
            count = df[df['name'] == player].count()[0]
            for index,numb in enumerate(number):
                if numb == count:
                    counts[index] += 1

        ax.bar(number, counts, color = 'red')
        ax.set_title('Распределение хоккеистов по количеству участий в ЧМ')
        ax.set_xlabel('Количество ЧМ')
        ax.set_ylabel('Доля')
        plt.tight_layout()
        plt.show()

    def height_position(position,years):
        height = list()
        for year in years:
            heights_pl = df[(df['position'] == position) & (df['year'] == year)]['height']
            sum = 0
            for heights_one_pl in heights_pl:
                sum += int(heights_one_pl)
            mean = round(sum / len(heights_pl))
            height.append(mean)
        return height

    def Height():
        fig, ax = plt.subplots(figsize=(8,5))
        years = df['year']
        years = years.drop_duplicates()
        yer = list()
        for year in years:
            yer.append(int(year))

        height_d = height_position('D',years)
        z = numpy.polyfit(yer, height_d, 1)
        p = numpy.poly1d(z)
        ax.plot(yer, p(yer), label = 'Защитник',linestyle = '--')

        height_f = height_position('F',years)
        z = numpy.polyfit(yer, height_f, 1)
        p = numpy.poly1d(z)
        ax.plot(yer, p(yer), label = 'Нападающий',linestyle = '--')

        height_g = height_position('G',years)
        z = numpy.polyfit(yer, height_g, 1)
        p = numpy.poly1d(z)
        ax.plot(yer, p(yer), label = 'Вратарь',linestyle = '--')


        ax.set_title('Тренды изменения роста игрока для каждой позиции')
        ax.set_xlabel('год')
        ax.set_ylabel('рост (см)')
        ax.legend()
        plt.tight_layout()
        plt.show()

    def Month_birth():
        fig, ax = plt.subplots()
        months = ['янв','фев','март','апр','май','июнь','июль','авг','сен','окт','нояб','дек']
        months_numb = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12']
        count_players = list()
        every = df['birth']
        for index in months_numb:
            count = 0
            for peap in every:
                if peap[5:7] == index:
                    count += 1
            count_players.append(count)

        ax.bar(months, count_players)

        ax.set_title('Распределение хоккеистов по месяцам рождения')
        ax.set_xlabel('месяц')
        ax.set_ylabel('количество человек')
        plt.tight_layout()
        plt.show()

    def Percent():
        fig, ax = plt.subplots()
        count_d = df[df['position'] == 'D'].count()[0]
        count_g = df[df['position'] == 'G'].count()[0]
        count_f = df[df['position'] == 'F'].count()[0]
        sum = count_d + count_g + count_f

        percent_d = (sum/100)*count_d
        percent_g = (sum/100)*count_g
        percent_f = (sum/100)*count_f

        percent = [percent_f,percent_d,percent_g]
        labels = ['Нападающий','Защитник','Вратарь']
        ax.set_title('Распределение позиций между хоккеистами')
        ax.pie(percent, labels=labels,autopct='%1.1f%%')
        plt.show()


    Number_cw()
    Height()
    Month_birth()
    Percent()

except FileNotFoundError:
    print('Файл не найден')